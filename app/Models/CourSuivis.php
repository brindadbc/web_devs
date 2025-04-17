<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CourSuivis extends Model
{
    use HasFactory;
    public function student(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'courSuivis', 'cour_id', 'student_id');
    }
    
}
