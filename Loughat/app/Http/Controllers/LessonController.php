<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Repositories\LessonRepository;
use App\Repositories\SectionRepository;
use App\Repositories\CoursRepository;
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
    public function showLessonByCours($coursId)
    {
        $course = $this->coursRepository->find($coursId);

        if (!$course) {
            return response()->json([
                'message' => 'Course not found'
            ]);
        }

        $sections = $this->sectionRepository->getSectionsByCourse($coursId);
        $lessons = $this->lessonRepository->getAllLessonBySection($sections);

        return view('teacherdashboard.show-lessons', compact('lessons', 'course'));
    }
}
