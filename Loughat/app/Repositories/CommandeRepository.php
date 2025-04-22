<?php

namespace App\Repositories;

use App\Models\Commande;

class CommandeRepository 
{

    public function create(array $data)
    {
        $commande =  Commande::create($data);
        if  (! $commande)
        {
            return false ; 
        }
        return $commande;
    }

}