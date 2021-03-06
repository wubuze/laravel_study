<?php

namespace App\Http\Controllers\Api;

use Test;
use App\Model\Client;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

class Access extends Controller
{
    public function __construct()
    {
//        config(['auth.defaults.guard'=> 'api' ]);//已经在TouteServiceProvider配置
//        $this->middleware('authJwt')->except(['reg', 'login']);

    }

    public function reg()
    {

        $res = Client::create([
            'name' => 'wu2',
            'account' => 'wubuze2',        //
            'pwd' => bcrypt('123456')  //加密务必用Laravel中hepler提供的bcrypt
        ]);

        return  $token = auth()->login($res);//登入


//        return $res;
    }

    public function login(Request $req)
    {

        return Test::get();//使用 facades
//        return 1;
        $token = JWTAuth::attempt(['account'=> $req->account,'password'=>$req->pwd]);

        return response(json_encode(['token'=>$token]),200);

    }

    public function getUser(Request $req)
    {

//        $user =  Auth::guard()->user();
        $user = $req->user();


        return $user;


    }

}
