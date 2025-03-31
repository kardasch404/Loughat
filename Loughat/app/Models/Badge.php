<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

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
