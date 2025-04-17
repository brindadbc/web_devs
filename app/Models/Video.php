<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'video_url', 'thumbnail_url', 'lecon_id'];

    public function lecon()
    {
        return $this->belongsTo(Lecon::class);
    }
}
