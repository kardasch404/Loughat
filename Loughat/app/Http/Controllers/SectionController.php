<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Repositories\CoursRepository;
use App\Repositories\SectionRepository;

class SectionController extends Controller
{

    protected $sectionRepository;
    protected $coursRepository;

    public function __construct(SectionRepository $sectionRepository, CoursRepository $coursRepository)
    {
        $this->sectionRepository = $sectionRepository;
        $this->coursRepository = $coursRepository;
    }

    public function create()
    {
        $teacherId = session('user_id');
        $courses = $this->coursRepository->getCoursesByTeacher($teacherId);
        // dd($courses);
        return view('teacherdashboard.create-cours-section', compact('courses'));
    }

    public function store(SectionRequest $request)
    {
        try {
            // dd('gfhjkl');

            $data = $request->validated();

            $coursId = $request->input('cours_id');
            // dd($coursId);

            // dd($request->all());

            $sections = $this->sectionRepository->create($data, $coursId);

            // dd($sections);

            if (! $sections) {
                return response()->json([
                    'message' => "sections not created"
                ]);
            }
            return response()->json([
                'message' => "sections created seccss"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
    public function getSectionsByCourse($courseId)
{
    $sections = $this->sectionRepository->getSectionsByCourse($courseId);
    return response()->json(['sections' => $sections]);
}
}
