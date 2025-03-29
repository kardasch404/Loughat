<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    //

    protected $fillable = [
        'name', 
        'description', 
        'logo'
    ];

    public function cours()
    {
        return $this->hasOne(Cours::class);
    }
}
