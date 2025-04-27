<?php

namespace App\Repositories;
use App\Models\Commande;

class CommandeRepository
{
    public function create(array $data, $coursId, $userId)
    {
        $commande = new Commande();
        $commande->status = $data['status'];
        $commande->montant = $data['montant'];
        $commande->cours_id = $coursId;
        $commande->user_id = $userId;
        $commande->save();

        return $commande;
    }
    public function find($id)
    {
        $commande = Commande::find($id);
        return $commande;
    }
    public function all()
    {
        $commandes = Commande::all();
        return $commandes;
    }

}
