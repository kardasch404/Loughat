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

    public function index()
    {
       try{
        $commandes = $this->commandeRepository->all();
        if ($commandes) {
            return response()->json([
                'commandes' => $commandes
            ], 200);
        }
       }catch(\Exception $e){
        return response()->json([
            'error' => $e->getMessage(),
            'message' => 'Commande not found '
        ], 500);
       }
    }

    public function show($id)
    {
       try{
        $commande = $this->commandeRepository->find($id);
        if ($commande) {
            return response()->json([
                'commande' => $commande
            ], 200);
        }
       }catch(\Exception $e){
        return response()->json([
            'error' => $e->getMessage(),
            'message' => 'Commande not found '
        ], 500);
       }
    }
    public function update(CommandeRequest $request, $id)
    {
       try{
        $data = $request->validated();
        $commande = $this->commandeRepository->update($id, $data);
        if ($commande) {
            return response()->json([
                'message' => 'Commande updated success'
            ], 200);
        }
       }catch(\Exception $e){
        return response()->json([
            'error' => $e->getMessage(),
            'message' => 'Commande not updated '
        ], 500);
       }
    }
    public function destroy($id)
    {
       try{
        $commande = $this->commandeRepository->delete($id);
        if ($commande) {
            return response()->json([
                'message' => 'Commande deleted success'
            ], 200);
        }
       }catch(\Exception $e){
        return response()->json([
            'error' => $e->getMessage(),
            'message' => 'Commande not deleted '
        ], 500);
       }
    }
    



 
}
