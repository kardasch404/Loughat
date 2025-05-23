<?php

namespace App\Repositories;

use App\Models\Cours;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

class CoursRepository
{

    public function create(array $data, $categorieId, $teacherId)
    {
        $cours = new Cours();
        $cours->title = $data['title'];
        $cours->description = $data['description'];
        $cours->photo = $data['photo'];
        $cours->price = $data['price'];
        $cours->level = $data['level'];
        $cours->categorie_id = $categorieId;
        $cours->teacher_id = $teacherId;
        $cours->save();
        return $cours;
    }

    public function update(array $data, $coursId, $categorieId)
    {
        $cours = Cours::find($coursId);
        if (!$cours) {
            return false;
        }

        if (isset($data['title'])) {
            $cours->title = $data['title'];
        }

        if (isset($data['description'])) {
            $cours->description = $data['description'];
        }

        if (isset($data['photo'])) {
            $cours->photo = $data['photo'];
        }

        if (isset($data['price'])) {
            $cours->price = $data['price'];
        }

        if (isset($data['level'])) {
            $cours->level = $data['level'];
        }
        if ($categorieId) {
            $cours->categorie_id = $categorieId;
        }

        $cours->save();
        return $cours;
    }

    public function find($coursId)
    {
        return Cours::find($coursId);
    }

    public function delete($coursId)
    {
        $cours = Cours::find($coursId);
        if (!$cours) {
            return false;
        }
        $cours->delete();
        return true;
    }
    public function getCoursesByTeacher($teacherId)
    {
        return Cours::where('teacher_id', $teacherId)->get();
    }
    public function all()
    {
        return Cours::all();
    }

    public function searchCours($search)
    {
        return Cours::query()
            ->where('title', 'like', "%$search%");
    }

    public function pagination()
    {
        return Cours::paginate(8);
    }
    public function filterCourses(Request $request)
    {
        $query = Cours::query();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        if ($request->has('categories')) {
            $query->whereIn('categorie_id', $request->categories);
        }
        if ($request->has('levels')) {
            $query->whereIn('level', $request->levels);
        }
        return $query->with('teacher')->paginate(8);
    }

    public function getTeacherIdByCoursId ($coursId)
    {
        $cours = Cours::find($coursId);
        if ($cours) {
            return $cours->teacher_id;
        }
        return null;
    }
}
