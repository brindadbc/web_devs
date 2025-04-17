<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ['valeur', 'user_id', 'lecon_id'];

    // Relation : une note appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation : une note est associée à une leçon
    public function lecon()
    {
        return $this->belongsTo(Lecon::class);
    }
}
