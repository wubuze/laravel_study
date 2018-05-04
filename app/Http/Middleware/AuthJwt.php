<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class AuthJwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //
//        Config::set('auth.providers.users.model', \App\Model\SDWClient::class);
        Config::set('auth.defaults.guard', 'api');
        $user = $request->user();
        if (!$user) {
            return response('token is error',403);
        }

        return $next($request);
    }
}
