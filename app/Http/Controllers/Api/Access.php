<?php

namespace App\Http\Controllers\Api;

use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Access extends Controller
{
    public function __construct()
    {
        $this->middleware('authJwt')->except(['reg', 'login']);
    }

    public function reg()
    {

        $res = User::create([
            'name' => 'wu',
            'email' => 'wu@qq.com',        //
            'password' => bcrypt('123456')  //加密务必用Laravel中hepler提供的bcrypt
        ]);

        return $res;
    }

    public function login(Request $req)
    {
        $token = JWTAuth::attempt(['email'=>'wu2@qq.com','password'=>123456]);
        return response(json_encode(['token'=>$token]),200);

    }

    public function getUser(Request $req)
    {
        $user =  Auth::guard()->user();
        $user = $req->user('api');



        return $user;


    }

}
