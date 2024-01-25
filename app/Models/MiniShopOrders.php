<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MiniShopOrders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'post_url',
        'likesValue',
        'commentsValue',
        'sharesValue',
        'savesValue',
        'likesUnits',
        'commentsUnits',
        'sharesUnits',
        'savesUnits',
        'total',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
