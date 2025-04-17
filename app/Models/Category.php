<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'color'];

    /**
     * Get the courses for the category.
     */
    public function courses()
    {
        return $this->hasMany(Courses::class);
    }
}




