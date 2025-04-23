<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'title',
        'description',
        'photo',
        'price',
        'vedios',
        'level'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function commande()
    {
        return $this->hasMany(Commande::class);
    }
    public function badge()
    {
        return $this->belongsTo(Badge::class);
    }
    public function reviews()
    {
        return $this->hasMany(CoursReview::class);
    }
}
