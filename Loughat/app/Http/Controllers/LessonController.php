<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Http\Requests\LessonUpdateRequest;
use App\Repositories\LessonRepository;
use App\Repositories\SectionRepository;
use App\Repositories\CoursRepository;
use Exception;
use Illuminate\Support\Facades\Request;

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

    public function update(LessonUpdateRequest $request, $lessonId)
    {
        // dd('gfd');
        try {
            $data = $request->validated();
            $lesson = $this->lessonRepository->find($lessonId);
            if (! $lesson) {
                return response()->json([
                    'message' => 'Lesson not found',
                ], 201);
            }
            $updatelesson = $this->lessonRepository->update($data, $lessonId);
            // return response()->json([
            //     'message' => 'Lesson update success',
            //     'data' => $updatelesson
            // ], 201);
            return redirect()->route('lessons.show', ['coursId' => $lesson->section->course_id]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 201);
        }
    }

    public function edit($lessonId)
    {
        $lesson = $this->lessonRepository->find($lessonId);

        if (!$lesson) {
            return response()->json([
                'error' => 'Lesson not found'
            ]);
        }
        $coursId = $lesson->section->course_id;
        $sections = $this->sectionRepository->getSectionsByCourse($coursId);
        return view('teacherdashboard.edit-lesson', compact('lesson', 'sections'));
    }
    public function destroy($lessonId)
    {
        try {
            $lesson = $this->lessonRepository->find($lessonId);
            if (!$lesson) {
                return redirect()->back()->with('error', 'Lesson not found');
            }
            $courseId = $lesson->section->course_id;

            $deleted = $this->lessonRepository->delete($lessonId);

            return redirect()->route('lessons.show', ['coursId' => $courseId]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
