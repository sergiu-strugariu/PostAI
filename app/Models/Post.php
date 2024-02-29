<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function photos()
    {
        return $this->hasMany(PostPhoto::class);
    }
}
