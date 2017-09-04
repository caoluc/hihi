<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\Admin\RoleService;
use Gate;

class RolesController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        abort_if (Gate::denies('permission', 'role.list'), 403, 'Unauthorized action.');
        $this->viewData['roles'] = Role::all();

        return view('admin.roles.index', $this->viewData);
    }

    public function getChangePermission(Role $role)
    {
        abort_if (Gate::denies('permission', 'role.edit'), 403, 'Unauthorized action.');
        $this->viewData['role'] = $role;
        $this->viewData['rolePermissions'] = RoleService::getRolePermissions($role);
        $this->viewData['listPermissions'] = config('permission.lists');

        return view('admin.roles.change_permission', $this->viewData);
    }

    public function postChangePermission(Request $request,Role $role)
    {
        abort_if (Gate::denies('permission', 'role.edit'), 403, 'Unauthorized action.');
        $permissions = $request->get('permission') ?: [];
        if (RoleService::updateRolePermissions($role, $permissions)) {
            return redirect()->action('Admin\RolesController@getChangePermission', $role->id)->with('message', trans('labels.update_success'));
        }

        return redirect()->action('Admin\RolesController@index')->with('message', trans('labels.update_false'));
    }
}
