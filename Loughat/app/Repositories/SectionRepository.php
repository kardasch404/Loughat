<?php

namespace App\Repositories;

use App\Models\Cours;
use App\Models\Section;

class SectionRepository
{
    public function create(array $data, $coursId)
    {
        $cours = Cours::find($coursId);

        if (!$cours) {
            return false;
        }
        // dd($cours);

        $section = 
        $section = new Section();
        $section->title = $data['title'];
        $section->order = $data['order'];
        $section->course_id = $coursId;
        $section->save();
        return $section;
    }

    public function getSectionsByCourse($courseId)
    {
        return Section::where('course_id', $courseId)->get();
    }

    public function getCoursesWithSection ($coursId)
    {
        return Section::with('cours')
        ->where('course_id', $coursId)
        ->orderBy('order')
        ->get();
           
    }

}
