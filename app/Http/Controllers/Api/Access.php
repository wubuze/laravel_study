<?php

namespace App\Http\Controllers\Api;

use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Access extends Controller
{
    public function reg()
    {

        $res = User::create([
            'name' => 'wu2',
            'email' => 'wu2@qq.com',        //
            'password' => bcrypt('123456')  //加密务必用Laravel中hepler提供的bcrypt
        ]);

        return $res;
    }

    public function login()
    {
        $token = JWTAuth::attempt(['email'=>'wu@qq.com','password'=>123456]);
        return response(json_encode(['token'=>$token]),200);

    }

    public function getUser(Request $req)
    {
//        $user =  Auth::guard()->user();
        $user = $req->user('api');

        if (!$user) {
             return response('token is error',403);
        }

        return $user;


    }

}
