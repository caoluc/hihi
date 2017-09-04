<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->viewData['title'] = trans('admin/global.title');
        return view('admin.index', $this->viewData);
    }
}
