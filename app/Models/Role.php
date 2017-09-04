<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Role extends BaseModel
{

    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'access_admin',
    ];

    protected $appends = [];

    public function permissions()
    {
        return $this->hasMany('App\Models\RolePermission', 'role_id', 'id');
    }

    public function hasDefinePrivilege($permission)
    {
        $permissions = $this->permissions()->lists('permission')->toArray();

        return in_array($permission, $permissions);
    }

    public function isAccessAdmin()
    {
        return $this->access_admin;
    }

    public function isSuperAdmin()
    {
        return in_array($this->id, config('user.super_admin'));
    }
}
