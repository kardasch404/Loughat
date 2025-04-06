<?php

namespace App\Repositories;

use App\Models\Cours;

class CoursRepository {

    public function create (array $data, $categorieId)
    {
        $cours = new Cours();
        $cours->title = $data['title'];
        $cours->description = $data['description'];
        $cours->photo = $data['photo'];
        $cours->price = $data['price'];
        $cours->level = $data['level'];
        $cours->categorie_id = $categorieId ;
        $cours->save();
        return $cours;
    }
}