<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    
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
