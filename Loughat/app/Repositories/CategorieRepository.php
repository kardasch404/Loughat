<?php

namespace App\Repositories;

use App\Models\Categorie;


class CategorieRepository {

    public function create(array $data)
    {
        return Categorie::create($data);
    }
}