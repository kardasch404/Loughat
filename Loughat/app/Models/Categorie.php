<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //

    protected $fillable = 
    [
        'name', 
        'logo'
    ];

    public function cours ()
    {
        return $this->hasMany(Cours::class);
    }
}
