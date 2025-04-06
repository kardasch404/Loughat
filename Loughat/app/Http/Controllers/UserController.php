<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

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
}
