<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'password', 'verification_code', 'is_verified'
    ];

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

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'id_user', 'id_role');
    }

    public function hasAnyRoles($roles)
    {
        if($this->roles()->whereIn('name', $roles)->first()){
            return true;
        }

        return false;
    }

    public function hasRole($role)
    {
        if($this->roles()->where('name', $role)->first()){
            return true;
        }

        return false;
    }

    public function relawan()
    {
        return $this->hasOne('App\Relawan', 'id_user', 'id');
    }

    public function programFunds() // untuk relasi fundraiser
    {
        return $this->belongsToMany('App\Program', 'program_fundraiser', 'id_user', 'id_program');
    }
}
