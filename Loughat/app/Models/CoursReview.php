<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'review'
    ];
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }
}
