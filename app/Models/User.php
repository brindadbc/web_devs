<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasFactory;

    // Un enseignant peut avoir plusieurs cours
 


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function lessonRatings()
    {
        return $this->hasMany(LessonRating::class);
    }

    public function lessonLikes()
    {
        return $this->hasMany(LessonLike::class);
    }

    public function lessonFavorites()
    {
        return $this->hasMany(LessonFavorite::class);
    }

    public function hasLikedLesson($lessonId)
    {
        return $this->lessonLikes()->where('lesson_id', $lessonId)->exists();
    }

    public function hasFavoritedLesson($lessonId)
    {
        return $this->lessonFavorites()->where('lesson_id', $lessonId)->exists();
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class)
            ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function isOnline()
{
    // User is considered online if they've been active in the last 5 minutes
    return Cache::has('user-online-' . $this->id);
}


//     public function getAvatarUrl()
// {
//     return $this->avatar ? asset('storage/' . $this->avatar) : asset('default-avatar.png');
// }

    // use HasApiTokens, HasFactory, Notifiable;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'role',
    // ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
 
    // public function cours()
    // {
    //     return $this->belongsToMany(Cour::class, 'cour_student', 'student_id', 'cour_id');
    // }
    
/** @use HasFactory<\Database\Factories\UserFactory> */
use HasFactory, Notifiable;



/**
 * The attributes that are mass assignable.
 *
 * @var list<string>
 */
protected $fillable = [
    'name',
    'email',
    'password',
    'role',
];

/**
 * The attributes that should be hidden for serialization.
 *
 * @var list<string>
 */
protected $hidden = [
    'password',
    'remember_token',
];

/**
 * Get the attributes that should be cast.
 *
 * @return array<string, string>
 */
protected function casts(): array
{
    return [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
}
