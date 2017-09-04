<?php

namespace  App\Services;

use File;
use Image;

class ImageService
{
    public static function upload($image, $type, $prefix, $filename = null, $delete = false)
    {
        try {
            $filename = $filename ?: sha1(time()) . '.' . $image->getClientOriginalExtension();
            $image = Image::make($image);
            $uploadDir = public_path() . config('images.paths.' . $type) . '/' . $prefix;
            File::exists($uploadDir) or File::makeDirectory($uploadDir);

            if ($delete) {
                File::cleanDirectory($uploadDir);
            }

            $srcFile = $uploadDir . '/original_' . $filename;
            $image->encode()->save($srcFile);
            foreach (config('images.dimensions.' . $type) as $key => $dimension) {
                $destFile = $uploadDir . '/'. $key . '_' . $filename;
                self::uploadResizedImageFile($srcFile, $destFile, $dimension);
            }

            return $filename;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function filePathInfo($file)
    {
        $pathinfo = pathinfo($file);
        if (empty($pathinfo['filename'])) {
            $suffix = !empty($pathinfo['extension']) ? '.'.$pathinfo['extension'] : '';
            $pathinfo['filename'] = basename($pathinfo['basename'], $suffix);
        }
        return $pathinfo;
    }

    public static function uploadResizedImageFile($srcFile, $destFile, $geometry, $quality = 75)
    {
        copy($srcFile, $destFile);
        @chmod($destFile, 0777);
        $pathinfo = self::filePathInfo($srcFile);
        $src = null;
        $createHandler = null;
        $outputHandler = null;
        switch (strtolower($pathinfo['extension'])) {
            case 'gif':
                $createHandler = 'imagecreatefromgif';
                $outputHandler = 'imagegif';
                break;
            case 'jpg':
            case 'jpeg':
                $createHandler = 'imagecreatefromjpeg';
                $outputHandler = 'imagejpeg';
                break;
            case 'png':
                $createHandler = 'imagecreatefrompng';
                $outputHandler = 'imagepng';
                $quality = null;
                break;
            default:
                return false;
        }
        if ($src = $createHandler($destFile)) {
            $srcW = imagesx($src);
            $srcH = imagesy($src);
            $resizeMode = false;
            // determine destination dimensions and resize mode from provided geometry
            if (preg_match('/^\\[[\\d]+x[\\d]+\\]$/', $geometry)) {
                // resize with banding
                list($destW, $destH) = explode('x', substr($geometry, 1, strlen($geometry) - 2));
                $resizeMode = 'band';
            } elseif (preg_match('/^[\\d]+x[\\d]+$/', $geometry)) {
                // cropped resize (best fit)
                list($destW, $destH) = explode('x', $geometry);
                $resizeMode = 'best';
            } elseif (preg_match('/^[\\d]+w$/', $geometry)) {
                // calculate heigh according to aspect ratio
                $destW = (int)$geometry - 1;
                $resizeMode = false;
            } elseif (preg_match('/^[\\d]+h$/', $geometry)) {
                // calculate width according to aspect ratio
                $destH = (int)$geometry - 1;
                $resizeMode = false;
            } elseif (preg_match('/^[\\d]+l$/', $geometry)) {
                // calculate shortest side according to aspect ratio
                if ($srcW > $srcH) {
                    $destW = (int)$geometry - 1;
                } else {
                    $destH = (int)$geometry - 1;
                }
                $resizeMode = false;
            }
            if (!isset($destW)) {
                $destW = ($destH / $srcH) * $srcW;
            }
            if (!isset($destH)) {
                $destH = ($destW / $srcW) * $srcH;
            }
            // determine resize dimensions from appropriate resize mode and ratio
            if ($resizeMode == 'best') {
                // "best fit" mode
                if ($srcW > $srcH) {
                    if ($srcH / $destH > $srcW / $destW) {
                        $ratio = $destW / $srcW;
                    } else {
                        $ratio = $destH / $srcH;
                    }
                } else {
                    if ($srcH / $destH < $srcW / $destW) {
                        $ratio = $destH / $srcH;
                    } else {
                        $ratio = $destW / $srcW;
                    }
                }
                $resizeW = $srcW * $ratio;
                $resizeH = $srcH * $ratio;
            } elseif ($resizeMode == 'band') {
                // "banding" mode
                if ($srcW > $srcH) {
                    $ratio = $destW / $srcW;
                } else {
                    $ratio = $destH / $srcH;
                }
                $resizeW = $srcW * $ratio;
                $resizeH = $srcH * $ratio;
            } else {
                // no resize ratio
                $resizeW = $destW;
                $resizeH = $destH;
            }
            $img = imagecreatetruecolor($destW, $destH);
            imagefill($img, 0, 0, imagecolorallocate($img, 255, 255, 255));
            imagecopyresampled(
                $img,
                $src,
                ($destW - $resizeW) / 2,
                ($destH - $resizeH) / 2,
                0,
                0,
                $resizeW,
                $resizeH,
                $srcW,
                $srcH
            );
            $outputHandler($img, $destFile, $quality);

            return true;
        }

        return false;
    }
}