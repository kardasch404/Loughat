<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class RefreshUserSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            if ($token = $request->cookie('token')) {
                $user = JWTAuth::setToken($token)->authenticate();
                
                if ($user && !session()->has('user_id')) {
                    session([
                        'user_id' => $user->id,
                        'user_firstname' => $user->firstname,
                        'user_lastname' => $user->lastname,
                        'user_photo' => $user->photo,
                        'user_role' => $user->roles()->first()->name,
                    ]);
                }
            }
        } catch (\Exception $e) {
        }
        return $next($request);
    }
}
