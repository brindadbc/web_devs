<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'video_type',
        'video_url',
        'duration',
        'order',
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(LessonRating::class);
    }

    public function likes()
    {
        return $this->hasMany(LessonLike::class);
    }

    public function favorites()
    {
        return $this->hasMany(LessonFavorite::class);
    }

    public function getAverageRatingAttribute()
    {
        return $this->ratings()->avg('rating') ?? 0;
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites()->count();
    }

    public function isLikedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    public function isFavoritedByUser($userId)
    {
        return $this->favorites()->where('user_id', $userId)->exists();
    }

    public function getRatingByUser($userId)
    {
        $rating = $this->ratings()->where('user_id', $userId)->first();
        return $rating ? $rating->rating : null;
    }


    public function getEmbedUrlAttribute()
    {
        if ($this->video_type == 'youtube') {
            return 'https://www.youtube.com/embed/' . $this->video_url;
        } elseif ($this->video_type == 'vimeo') {
            return 'https://player.vimeo.com/video/' . $this->video_url;
        } elseif ($this->video_type == 'upload') {
            return asset('storage/' . $this->video_url);
        } else {
            return $this->video_url;
        }
    } 
}




   