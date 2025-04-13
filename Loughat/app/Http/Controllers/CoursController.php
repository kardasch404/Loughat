<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursRequest;
use App\Repositories\CategorieRepository;
use App\Repositories\CoursRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoursController extends Controller
{
    protected $coursRepository;
    protected $categorieRepository;
    public function __construct(CoursRepository $coursRepository, CategorieRepository $categorieRepository)
    {
        $this->coursRepository = $coursRepository;
        $this->categorieRepository = $categorieRepository;
    }

    public function index()
    {
        $courses = $this->coursRepository->all();
        return view('teacherdashboard.courses', compact('courses'));
    }

    public function create()
    {
        $categories = $this->categorieRepository->all();
        return view('teacherdashboard.create-cours', compact('categories'));
    }

    public function store(CoursRequest $request)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $path = $file->store('courses', 'public');
                $data['photo'] = $path;
            }

            $categorie = $this->categorieRepository->find($data['categorie_id']);
            if (! $categorie) {
                return response()->json(['error' => 'Categorie not found'], 404);
            }
            $cours = $this->coursRepository->create($data, $data['categorie_id']);

            $categories = $this->categorieRepository->all();

            return view('teacherdashboard.create-cours', compact('cours', 'categories'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $coursId)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'sometimes|string|max:250',
                'description' => 'sometimes|string|max:500',
                'photo' => 'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2048',
                'price' => 'sometimes|numeric|max:500',
                'level' => 'sometimes|string|max:500',
                'categorie_id' => 'sometimes|nullable',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $data = $validator->validated();
            $cours = $this->coursRepository->find($coursId);
            if (!$cours) {
                return response()->json(['error' => 'Cours not found'], 404);
            }
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $path = $file->store('courses', 'public');
                $data['photo'] = $path;
            }

            $categorieId = $request->input('categorie_id');
            $cours = $this->coursRepository->update($data, $coursId, $categorieId);

            return redirect()->route('courses')->with('success', 'Course updated successfully');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function edit($coursId)
    {
        $cours = $this->coursRepository->find($coursId);
        if (!$cours) {
            return redirect()->back()->with('error', 'Course not found');
        }
        $categories = $this->categorieRepository->all();
        return view('teacherdashboard.edit-cours', compact('cours', 'categories'));
    }


    public function delete($coursId)
    {
        try {
            $deleted = $this->coursRepository->delete($coursId);
            if (!$deleted) {
                return redirect()->back();
            }
            return redirect()->route('courses');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete course');
        }
    }
}
