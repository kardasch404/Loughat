<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'photo',
        'phone',
        'email',
        'password',
        'status',
        'bio',
        'specialization'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }
    public function courses()
    {
        return $this->hasMany(Cours::class, 'teacher_id');
    }
    public function coursCommandes()
    {
        return $this->belongsToMany(Cours::class, 'commandes', 'user_id', 'cours_id');
    }
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
    public function coursReviews()
    {
        return $this->hasMany(CoursReview::class);
    }
    public function teacherReviewsReceived()
    {
        return $this->hasMany(TeacherReview::class, 'teacher_id');
    }
    public function teacherReviewsGiven()
    {
        return $this->hasMany(TeacherReview::class, 'student_id');
    }
    public function portfolio()
    {
        return $this->hasOne(Portfolio::class, 'teacher_id');
    }
    public function commandes()
    {

        return $this->hasMany(Commande::class);
    }
}
