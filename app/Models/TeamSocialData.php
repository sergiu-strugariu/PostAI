<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamSocialData extends Model
{
    use HasFactory;

    protected $fillable = [
        'twitter_access_token',
        "twitter_access_token_secret",  
        'pinterest',
        'linkedin',
        'facebook',
        'instagram',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
