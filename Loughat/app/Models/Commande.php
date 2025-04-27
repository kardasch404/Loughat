<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'status',
        'date', 
        'montant'
    ];

    public function cours ()
    {
        return $this->belongsTo(Cours::class);
    }
    public function payment ()
    {
        return $this->hasOne(Payment::class, 'command_id');
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    
    
}
