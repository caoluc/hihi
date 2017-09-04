<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class BaseController extends Controller
{
    protected $viewData;

    public function __construct()
    {
        $this->viewData = [];
        $this->viewData['nav'] = $this->routeArray();
    }

    public function routeArray()
    {
        $routeArray = Str::parseCallback(Route::getCurrentRoute()->getActionName(), null);
        if (last($routeArray) != null) {
            $controller = str_replace('Controller', '', class_basename(head($routeArray)));
            $action = str_replace(['get', 'post', 'patch', 'put', 'delete'], '', last($routeArray));

            return [
                'controller' => Str::lower($controller),
                'action' => Str::lower($action),
            ];
        }

        return [];
    }
}
