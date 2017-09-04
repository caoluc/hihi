<?php

namespace App\Services\Admin;

use App\Models\RolePermission;
use DB;

class RoleService extends BaseService
{
    public static function getRolePermissions($role)
    {
        return $role->permissions()->lists('permission')->toArray();
    }

    public static function updateRolePermissions($role, $permissions)
    {
        DB::beginTransaction();
        try {
            $oldPermissions = $role->permissions()->lists('permission')->toArray();
            $deletePermissions = array_diff($oldPermissions, $permissions);
            $newPermissions = array_diff($permissions, $oldPermissions);
            $role->permissions()->whereIn('permission', $deletePermissions)->delete();
            foreach ($newPermissions as $permission) {
                RolePermission::create([
                    'role_id' => $role->id,
                    'permission' => $permission,
                ]);
            }
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();

            return false;
        }
    }
}
