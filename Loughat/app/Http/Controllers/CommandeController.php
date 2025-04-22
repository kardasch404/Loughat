<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandeRequest;
use App\Repositories\CommandeRepository;

class CommandeController extends Controller
{
    //
    protected $commandeRepository; 

    public function __construct(CommandeRepository $commandeRepository)
    {
        $this->commandeRepository = $commandeRepository;
    }

    public function store(CommandeRequest $request)
    {
       try{
        $data = $request->validated();
        $commande = $this->commandeRepository->create($data);
        if ($commande) {
            return response()->json([
                'message' => 'Commande created success'
            ], 201);
        } 
       }catch(\Exception $e){
        return response()->json([
            'error' => $e->getMessage(),
            'message' => 'Commande not created '
        ], 500);
       }
    }


 
}
