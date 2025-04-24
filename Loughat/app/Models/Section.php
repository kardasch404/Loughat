<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'order'
    ];

    public function course()
    {
        return $this->belongsTo(cours::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
