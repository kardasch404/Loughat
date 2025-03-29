<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //

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
