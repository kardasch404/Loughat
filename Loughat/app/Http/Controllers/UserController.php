<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            return redirect()->back()->with('error' . $e->getMessage());
        }
    }

    public function changePassword()
    {

    }

    public function showAdmin()
    {
        try{
            $adminId = session('user_id');
            $admin = $this->userRepository->find($adminId); 
            return view('admindashboard.profile', compact('admin'));
        }catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
