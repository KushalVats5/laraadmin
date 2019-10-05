<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'company', 'fname', 'lname', 'address', 'city', 'state', 'country', 'postal_code', 'phone', 'gender', 'description'
    ];
    // protected $guarded = [
    //     'company', 'fname', 'lname', 'address', 'city', 'state', 'country', 'postal_code', 'description'
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Get (Relation user with user_roles table) get from user_roles
    public function userRoles()
    {
        return $this->hasOne(UserRole::class, 'user_id', 'id');
    }

    // public function isAuthorized($object, $operation)
    // {
    //     return Db::table('role_permissions')
    //         ->where('object', $object)
    //         ->where('operation', $operation)
    //         ->join('user_roles', 'user_roles.role_id', '=', 'role_permissions.role_id')
    //         ->where('user_roles.user_id', $this->id)
    //         ->exists();
    // }

}
