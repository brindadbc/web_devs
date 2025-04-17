<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'description', 'cour_id'];

    public function cour()
    {
        return $this->belongsTo(Cour::class);
    }

    public function lecons()
    {
        return $this->hasMany(lecon::class);
    }
}
