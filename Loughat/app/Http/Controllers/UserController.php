<?php

namespace App\Http\Controllers;

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

    public function update (Request $request , $id)
    {
        try {
        $validator = Validator::make($request->all(), [
            'firstname' => 'sometimes|string|max:255',
            'lastname' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:500',
            'photo' => 'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2048',
            'email' => 'sometimes|string|email|max:255|unique:users',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $validator->validated();
        $user = $this->userRepository->find($id);
        if( ! $user)
        {
            return response()->json([
                'user' => 'User not found'
            ]);
        }
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('users', 'public');
            $data['photo'] = $path;
        }
        $user = $this->userRepository->update($data, $id);
        return redirect()->back();
        }catch(\Exception $e)
        {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
