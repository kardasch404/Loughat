<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'type',
        'duration',
        'file_path',
        'order'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class ,'section_id');
    }
}
