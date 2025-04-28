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

    public function cours()
    {
        return $this->belongsTo(Cours::class, 'course_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}