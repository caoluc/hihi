<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
class BaseController extends Controller
{
    protected $viewData;

    public function __construct()
    {
        $this->viewData = [];
    }
}
