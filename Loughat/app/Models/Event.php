<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //

    protected $fillable = 
    [
        'title',
        'description', 
        'lieu',
        'startDAte',
        'endDate'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
