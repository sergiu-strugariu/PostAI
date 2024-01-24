<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Handel extends Model
{
    use HasFactory;

    protected $fillable = [
        'handel',
        'team_id'
    ];
    

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
