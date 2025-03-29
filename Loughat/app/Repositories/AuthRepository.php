<?php

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthRepository
{
    public function register(array $data)
    {
        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
        $token = JWTAuth::fromUser($user);
        return  [
            'user' => $user,
            'token' => $token
        ];
    }
}
