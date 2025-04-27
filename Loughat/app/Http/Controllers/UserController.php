<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    //
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function showTeachers()
    {
        try {
            $teachers = $this->userRepository->allTeachers();
            return view('admindashboard.teacher-list', compact('teachers'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function showStudents()
    {
        try {
            $students = $this->userRepository->allStudents();
            return view('admindashboard.students-list', compact('students'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function getAllusersWithRole()
    {
        $users = $this->userRepository->getAllusersWithRole();
        return response()->json($users);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $user = $this->userRepository->find($id);

            if (!$user) {
                return redirect()->back()->with('error', 'User not found');
            }
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $path = $file->store('users', 'public');
                $data['photo'] = $path;
            }
            $user = $this->userRepository->update($data, $id);

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function edit()
    {
        $userId = session('user_id');
        $user = $this->userRepository->find($userId);
        if (!$user) {
            return response()->json([
                'error',
                'User not found'
            ]);
        }
        return view('students-profile', compact('user'));
    }


    public function showAdmin()
    {
        try {
            $adminId = session('user_id');
            $admin = $this->userRepository->find($adminId);
            return view('admindashboard.profile', compact('admin'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    public function changePassword(PasswordRequest $request, $id)
    {
        try {
            $password = $request->validated();
            $user = $this->userRepository->find($id);
            $user = session('user_id');
            $result = $this->userRepository->updatePassword($password, $user);

            // if ($result === false) {
            //     return response()->json([
            //         'message' => 'user not found',
            //     ],);
            // }
            // if ($result === 'old pass incorect') {
            //     return response()->json([
            //         'message' => 'old pass incorect',
            //     ],);
            // }
            // return response()->json([
            //     'message' => 'Password changed succes',
            //     'user' => $user
            // ], 200);
            return redirect()->back();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Password not changed',
                'error' => $e->getMessage()
            ]);
        }
    }
    public function showChangePasswordForm($id)
    {
        $user = $this->userRepository->find($id);

        return view('teacherdashboard.teacher-change-password', compact('user'));
    }
}
