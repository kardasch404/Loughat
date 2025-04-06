<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTAuthController extends Controller
{
    //

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        
        $requestedRole = $request->get('role');
        $status = ($requestedRole === 'Teacher') ? 'Valide' : 'pending';
        
        $user = User::create([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'status' => $status
            
        ]);

        $userRole = Role::where('name','user')->first();
        if ($userRole)
        {
            $user->roles()->attach($userRole->id);
        }
        $token = JWTAuth::fromUser($user);

        // return response()->json(compact('user','token'), 201);
        return redirect()->route('signin');
    }

    public function login (Request $request)
    {
        $data = $request->only( 'email','password');
        try {
            if ( ! $token = JWTAuth::attempt( $data) )
            {
                return response()->json([
                    'message' => 'error invaled data',
                ],401);
            }

            $user = auth()->user();
            $token = JWTAuth::fromUser($user);
            // return response()->json([

            //     'token' => $token
            // ]);
            return redirect()->route('home');
        }catch (JWTException $e)
        {
            return response()->json([
                'error' => 'error invaled data'.$e->getMessage(),
            ],500);
        }
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Successfully logged out']);
    }
}
