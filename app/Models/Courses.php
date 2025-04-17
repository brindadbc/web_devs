<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        // 'price',
        'image',
        'category_id',
        'rating',
        'instructor_name',
        'lessons_count',
        'hours_count',
        
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
   
public function lessons()
{
    return $this->hasMany(Lesson::class, 'course_id');
}
    /**
     * Get the formatted price.
     *
     * @return string
     */
    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    /**
     * Get the course image url.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        if ($this->image && file_exists(public_path('storage/' . $this->image))) {
            return asset('storage/' . $this->image);
        }
        
        return asset('images/placeholder.jpg');
    }
}
