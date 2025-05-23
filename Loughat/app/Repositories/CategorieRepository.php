<?php

namespace App\Repositories;

use App\Models\Categorie;


class CategorieRepository
{

    public function create(array $data)
    {
        return Categorie::create($data);
    }
    public function update(array $data, $id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->update($data);
        return $categorie;
    }
    public function find($id)
    {
        return Categorie::find($id);
    }

    public function delete($id)
    {
        $categorie = Categorie::find($id);

        if (!$categorie) {
            return false;
        }
        return $categorie->delete();
    }   

    public function all()
    {
        return Categorie::all();
    }
}
