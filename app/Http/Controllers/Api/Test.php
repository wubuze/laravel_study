<?php

namespace App\Http\Controllers\Api;

use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;

class Test extends Controller
{

    public function index()
    {
        $ufff =  new \G2B2G\Ufff();
        return $ufff->gb2312_big5('简体中文字符串');
        return 'teat';
    }
}
