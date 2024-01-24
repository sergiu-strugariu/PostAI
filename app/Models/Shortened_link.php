<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortened_link extends Model
{
    use HasFactory;
    protected $table = 'shortend_links';

    protected $fillable = [
        'original_url',
        'slug',
        'handel_id',
        'pixel_data'
    ];

    public function handel()
    {
        return $this->belongsTo(Handel::class);
    }
}
