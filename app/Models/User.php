<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'name',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isCurrent()
    {
        return auth()->user() && auth()->user()->id == $this->id;
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }

    public function hasDefinePrivilege($permission)
    {
        if (!$permission || !$this->role) {
            return false;
        }

        return $this->role->hasDefinePrivilege($permission);
    }

    public function isAccessAdmin()
    {
        return $this->role->isAccessAdmin();
    }

    public function isSuperAdmin()
    {
        return $this->role->isSuperAdmin();
    }
}
