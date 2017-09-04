<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gate;

class NetworksController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // abort_if (Gate::denies('permission', 'network.list'), 403, 'Unauthorized action.');

        return view('admin.networks.index', $this->viewData);
    }
}
