<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiniShop extends Model
{
    use HasFactory;

    protected $fillable = [
        'likes_price',
        'comments_price',
        'shares_price',
        'saves_price',
    ];
}
