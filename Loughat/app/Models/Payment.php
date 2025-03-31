<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'method', 
        'montant'
    ];

    public function commande ()
    {
        return $this->hasOne(Commande::class);
    }
}
