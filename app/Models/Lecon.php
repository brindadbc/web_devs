<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecon extends Model
{
    use HasFactory;
    protected $fillable = ['titre','contenu', 'cour_id'];
    public function getEmbedUrlAttribute()
    {
        if (strpos($this->video_url, 'youtube.com/watch') !== false) {
            return str_replace("watch?v=", "embed/", $this->video_url);
        }
        return $this->video_url;
    }
    
    public function cour()
    {
        return $this->belongsTo(Cour::class);
    }
    public function commentaires()
{
    return $this->hasMany(Commentaire::class);
}

public function notes()
{
    return $this->hasMany(Note::class);
}
public function videos()
{
    return $this->hasMany(Video::class);
}

}
