<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTAuthController extends Controller
{
    //
    protected $userRepository ; 

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository ; 
    }

    public function register(RegisterRequest $request)
    {
        try {

            $user = $this->userRepository->createUser($request->validated());

            $token = JWTAuth::fromUser($user);

            // return response()->json([
            //     'success' => true,
            //     'user' => $user,
            //     'token' => $token,
            //     'message' => 'User registered'
            // ], 201);

            return redirect()->route('signin');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Registration failed',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function login (LoginRequest $request)
    {
        try {
            $credentials = $request->validated();

            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid credentials'
                ], 401);
            }

            $user = auth()->user();
            $role = $user->roles()->first()->name;

            // return response()->json([
            //     'success' => true,
            //     'user' => [
            //         'firstname' => $user->firstname,
            //         'lastname' => $user->lastname,
            //         'email' => $user->email,
            //         'photo' => $user->photo,
            //         'role' => $role
            //     ],
            //     'token' => $token
            // ]);

            $this->setUserSession($user, $role);

            return $this->handleRoleBasedRedirect($role);
            
        }catch (JWTException $e)
        {
            return response()->json([
                'error' => 'Could not create token',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    protected function setUserSession($user, $role)
    {
        session([
            'user_id' => $user->id,
            'user_firstname' => $user->firstname,
            'user_lastname' => $user->lastname,
            'user_photo' => $user->photo,
            'user_role' => $role,
        ]);
    }

    protected function handleRoleBasedRedirect($role)
    {
        switch ($role) {
            case 'user':
                return view('home');
            case 'Teacher':
                return view('teacherdashboard.teacher_dashboard');
            case 'admin':
                return view('admindashboard.admin-dashboard-home');
            default:
                return redirect()->route('home');
        }
    }

     public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            session()->flush();
            return response()->json([
                'success' => true,
                'message' => 'logged out'
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to logout',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}