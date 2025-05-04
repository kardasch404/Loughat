<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

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
            // dd($students);
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
                $cloudinary = new Cloudinary([
                    'cloud' => [
                        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                        'api_key' => env('CLOUDINARY_API_KEY'),
                        'api_secret' => env('CLOUDINARY_API_SECRET'),
                    ],
                ]);
                $upload = $cloudinary->uploadApi()->upload($file->getRealPath(), [
                    'folder' => 'users',
                    'resource_type' => 'image',
                    'http_options' => [
                        'verify' => false,
                    ],
                ]);
                $data['photo'] = $upload['secure_url'];
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
            dd($result);
            return redirect()->back();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Password not changed',
                'error' => $e->getMessage()
            ]);
        }
    }
    public function showChangePasswordForm()
    {
        $teacher = auth()->user();
        return view('teacherdashboard.teacher-password', compact('teacher'));
    }
    public function editTeacherInfo()
    {
        $teacher = auth()->user();
        return view('teacherdashboard.teacher-profile', compact('teacher'));
    }

    public function updateTeacherStatus(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'status' => 'required|in:Valide,pending'
            ]);
            $teacher = User::findOrFail($id);
            $teacher->status = $validated['status'];
            $teacher->save();
            return response()->json([
                'success' => true,
                'new_status' => $teacher->status
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], 404);
        }
    }
    public function teacherList()
    {
        try {
            $teachers = User::whereHas('roles', function ($query) {
                $query->where('name', 'Teacher');
            })->get();

            return view('admindashboard.teacher-list', compact('teachers'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
}
