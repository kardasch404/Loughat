<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursRequest;
use App\Repositories\CategorieRepository;
use App\Repositories\CoursRepository;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    protected $coursRepository;
    protected $categorieRepository;
    public function __construct(CoursRepository $coursRepository, CategorieRepository $categorieRepository)
    {
        $this->coursRepository = $coursRepository;
        $this->categorieRepository = $categorieRepository;
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


    public function update(CoursRequest $request, $coursId, $categorieId)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $path = $file->store('courses', 'public');
                $data['photo'] = $path;
            }
            $cours = $this->coursRepository->find($coursId);
            $categorie = $this->categorieRepository->find($cours->categorie_id);
            if (! $cours) {
                return response()->json(['error' => 'Cours not found'], 404);
            }
            $cours = $this->coursRepository->update($data, $coursId, $categorieId);
            return response()->json([
                'message' => 'cours updated',
                'cours' => $cours
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function delete($coursId)
    {
        try {
            $cours = $this->coursRepository->delete($coursId);
            if (! $cours) {
                return response()->json(['error' => 'Cours not found'], 404);
            }
            return response()->json([
                'message' => 'cours deleted'
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
