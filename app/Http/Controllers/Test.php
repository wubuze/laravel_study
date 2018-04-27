<?php

namespace App\Http\Controllers;

use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class Test extends Controller
{
    public function reg() {

        $res = User::create([
            'name' => 'wubuze2',
            'email' => 'wubuze2@qq.com',        //
            'password' => bcrypt('123456')  //加密务必用Laravel中hepler提供的bcrypt
        ]);

        return $res;
    }

    public function login() {
        $token = JWTAuth::attempt(['email'=>'wubuze@qq.com','password'=>123456]);
        return response(json_encode(['token'=>$token]),200);

    }

}
