<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    //

    protected $fillable = 
    [
        'status',
        'date', 
        'montant'
    ];

    public function cours ()
    {
        return $this->hasOne(Cours::class);
    }
    public function payment ()
    {
        return $this->belongsTo(Payment::class);
    }
}
