<?php

namespace App\Http\Controllers\Api;

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
        $this->middleware('authJwt')->except(['reg', 'login']);
    }

    public function reg()
    {

        $res = Client::create([
            'name' => 'wu',
            'account' => 'wubuze',        //
            'pwd' => bcrypt('123456')  //加密务必用Laravel中hepler提供的bcrypt
        ]);

        return $res;
    }

    public function login(Request $req)
    {

        $token = JWTAuth::attempt(['account'=> $req->account,'password'=>$req->pwd]);
        return response(json_encode(['token'=>$token]),200);

    }

    public function getUser(Request $req)
    {
//        $user =  Auth::guard()->user();
        $user = $req->user('api');


        return $user;


    }

}
