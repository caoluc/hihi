<?php
namespace App\Models;

class RolePermission extends BaseModel
{

    protected $table = 'role_permissions';
    protected $guarded = ['id'];
    protected $fillable = ['role_id', 'permission'];

}