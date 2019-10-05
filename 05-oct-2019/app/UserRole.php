<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_roles';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Get (Relation user_roles with role table) get from user_roles
    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
}
