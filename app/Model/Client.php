<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Client extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'account', 'pwd'
    ];

    protected $table = 'client';

    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pwd', 'remember_token',
    ];

    //  JWT-Auth默认要实现的方法
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    // JWT-Auth默认要实现的方法
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     *  重写的方法
     */
    public function getAuthPassword()
    {
        return $this->getAttribute('pwd');  # 表中密码字段是pwd
    }

}
