<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterTeacherRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTAuthController extends Controller
{
    //
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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

    public function login(LoginRequest $request)
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
            $roleModel = $user->roles()->first();
            if ($roleModel) {
                $role = $roleModel->name;
            } else {
                $role = 'User';
            }

            if ($role === 'Teacher' && $user->status === 'pending') {
                $this->setUserSession($user, $role);
                Cookie::queue('token', $token, 600 * 24);
                return redirect()->route('pending');
            }

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
            Cookie::queue('token', $token, 600 * 24);

            return $this->handleRoleBasedRedirect($role);
        } catch (JWTException $e) {
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
                if (auth()->user()->status === 'pending') {
                    return redirect()->route('pending');
                }
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
            Cookie::queue(Cookie::forget('token'));
            // return response()->json([
            //     'success' => true,
            //     'message' => 'logged out'
            // ]);
            return redirect()->route('home');
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to logout',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function registerTeacher(RegisterTeacherRequest $request)
    {
        try {
            $validated = $request->validated();

            $user = $this->userRepository->createUser([
                'firstname' => $validated['firstname'],
                'lastname' => $validated['lastname'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'specialization' => $validated['specialization'],
                'role' => 'Teacher'
            ]);
            $teacherRole = \App\Models\Role::where('name', 'Teacher')->first();
            if ($teacherRole) {
                $user->roles()->attach($teacherRole->id);
            }

            $token = JWTAuth::fromUser($user);
            $this->setUserSession($user, 'Teacher');
            Cookie::queue('token', $token, 600 * 24);
            return redirect()->route('signin');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Registration failed: ' . $e->getMessage()]);
        }
    }
}
