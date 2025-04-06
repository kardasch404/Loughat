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

    public function create(CoursRequest $request, $categoriId)
    {
       try{
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('courses', 'public'); 
            $data['photo'] = $path;
        }

        $categorie = $this->categorieRepository->find($categoriId);
        if(! $categorie)
        {
            return response()->json(['error' => 'Categorie not found'], 404);
        }
        $cours = $this->coursRepository->create($data, $categoriId);

        return response()->json([
            'cours' => $cours
        ], 201);
       }catch(\Exception $e)
       {
        return response()->json(['error' => $e->getMessage()], 500);
       }

    }
    
}
