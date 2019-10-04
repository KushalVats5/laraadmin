<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'roles';

    // our roles that they have permissions assigned
    public function permissions()
    {
        return $this->hasMany(RolePermission::class, 'role_id', 'id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }
}
