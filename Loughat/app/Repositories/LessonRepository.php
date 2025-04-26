<?php

namespace App\Repositories;

use App\Models\Cours;
use App\Models\Lesson;

class LessonRepository
{

    public function create(array $data, $course)
    {
        $section = $course->sections()->first();

        if (! $section) {
            return false;
        }
        $lesson = new Lesson();
        $lesson->title = $data['title'];
        $lesson->type = $data['type'];
        $lesson->duration = $data['duration'];
        $lesson->file_path = $data['file_path'];
        $lesson->order = $data['order'];
        // $lesson->section_id = $section;
        $lesson->section_id = $data['section_id'];
        $lesson->save();
        return $lesson;
    }
   
}
