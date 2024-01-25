<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShortURL extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'company_name',
        'original_url',
        'short_url', 
        'code', 
        'pixel_api', 
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'company_id');
    }
}
