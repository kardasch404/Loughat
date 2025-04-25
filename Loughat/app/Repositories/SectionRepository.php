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
}
