<?php

namespace App\Repositories;

use App\Models\Commande;
use Illuminate\Console\Command;

class CommandeRepository 
{

    public function create(array $data,$coursId)
    {
        $commande = new Commande();
        $commande->status = $data['status'];
        $commande->montant = $data['montant'];
        $commande->cours_id = $coursId;
        $commande->save();

        return $commande;
    }

    public function update(array $data, $coursId)
    {
        $commande = Commande::find($commande->id);
        if (! $commande)
        {
            return false; 
        }
        $commande->status = $data['status'];
        $commande->montant = $data['montant'];
        $commande->cours_id = $coursId;
        $commande->save();

        return $commande;
    }

}