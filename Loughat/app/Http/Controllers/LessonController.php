<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Repositories\LessonRepository;
use App\Repositories\SectionRepository;
use App\Repositories\CoursRepository;
use Illuminate\Http\Request;
use Exception;

class LessonController extends Controller
{
    protected $lessonRepository;
    protected $sectionRepository;
    protected $coursRepository;

public function __construct(LessonRepository $lessonRepository, SectionRepository $sectionRepository, CoursRepository $coursRepository)
{
    $this->lessonRepository = $lessonRepository;
    $this->sectionRepository = $sectionRepository;
    $this->coursRepository = $coursRepository;
}

public function create()
{
    $teacherId = session('user_id');
    $courses = $this->coursRepository->getCoursesByTeacher($teacherId);  
    
    return view('teacherdashboard.create-cours-lessons', compact('courses'));
}

public function store(LessonRequest $request)
{
    try {
        $data = $request->validated();
        $teacherId = session('user_id');
        
        // Verify the course belongs to this teacher
        $course = $this->coursRepository->find($data['cours_id']);
        
        if (!$course || $course->teacher_id != $teacherId) {
            return response()->json([
                'message' => 'course not found '
            ], 404);
        }

        $lesson = $this->lessonRepository->create($data, $course);

        // return response()->json([
        //     'message' => 'Lesson created success',
        //     'data' => $lesson
        // ], 201);
        return redirect()->back();

    } catch (Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
}
}
