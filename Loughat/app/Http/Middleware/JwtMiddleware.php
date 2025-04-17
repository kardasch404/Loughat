<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException $e) {
            return response()->json([
                'error' => 'Token expired',
                'message'=> $e->getMessage()
            ], 401);
        } catch (TokenInvalidException $e) {
            return response()->json([
                'error' => 'Token invalid',
                'message'=> $e->getMessage()
            ], 401);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Token not found',
                'message'=> $e->getMessage()
            ], 401);
        }
        return $next($request);
    }
}
