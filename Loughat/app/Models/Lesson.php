<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'order'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
