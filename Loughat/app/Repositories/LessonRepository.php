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
        $lesson->section_id = $data['section_id'];
        $lesson->save();
        return $lesson;
    }
    public function getAllLessonBySection($sections)
    {
        if ($sections->isEmpty()) {
            return collect();
        }

        $sectionIds = $sections->pluck('id')->toArray();

        return Lesson::whereIn('section_id', $sectionIds)
            ->join('sections', 'lessons.section_id', '=', 'sections.id')
            ->select('lessons.*', 'sections.order as section_order')
            ->with('section')
            ->orderBy('sections.order')
            ->orderBy('lessons.order')
            ->get();
    }

    public function update(array $data, $lessonId)
    {
        $lesson = Lesson::find($lessonId);
        if (!$lesson) {
            return false;
        }

        if (isset($data['section_id'])) {
            $lesson->section_id  = $data['section_id'];
        }

        if (isset($data['title'])) {
            $lesson->title = $data['title'];
        }

        if (isset($data['type'])) {
            $lesson->type = $data['type'];
        }

        if (isset($data['duration'])) {
            $lesson->duration = $data['duration'];
        }

        if (isset($data['file_path'])) {
            $lesson->file_path = $data['file_path'];
        }
        if (isset($data['order'])) {
            $lesson->order = $data['order'];
        }
        $lesson->save();
        return $lesson;
    }
    public function find($lessonId)
    {
        $lesson = Lesson::find($lessonId);
        return $lesson;
    }
    public function delete($lessonId)
    {
        $lesson = Lesson::find($lessonId);
        if (! $lesson) {
            return false;
        }
        $lesson->delete();
        return true;
    }
    public function getLessonsBySection($sectionId)
    {
        return Lesson::where('section_id', $sectionId)
        ->orderBy('order')
        ->get();
    }
}
