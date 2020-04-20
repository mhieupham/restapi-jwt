<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class VerifyJWTToken
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
        try{
            $user = JWTAuth::toUser($request->input('token'));
        }catch(JWTException $e){
            return response()->json(['error'],$e->getMessage());
        }
        return $next($request);
    }
}
