<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    CONST ENABLE  = 1;
    CONST DISABLE = 2;

    CONST SUPPER_USER = 1;
    CONST ADMIN       = 2;
    CONST MODERATOR   = 3;
    CONST ALUMNI      = 4;
    CONST STUDENT     = 5;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address','phone','role_id','department_id','program','job','image','unique_id','batch','status'
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

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function department()
    {
        return $this->hasOne('App\Department');
    }
}
