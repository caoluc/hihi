<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public static function getTableName()
    {
        return with(new static)->getTable();
    }

    public function imageUrls($type, $field = 'image')
    {
        $images = [
            'original' => config('images.paths.' . $type) . '/original_' . $this->$field
        ];

        foreach (config('images.dimensions.'.$type) as $key => $dimension) {
            $images[$key] = config('images.paths.'.$type).'/'.$key.'_'.$this->$field;
        }

        return $images;
    }
}
