<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mini_shops', function (Blueprint $table) {
            $table->id();
            $table->integer('likes_price');
            $table->integer('comments_price');
            $table->integer('shares_price');
            $table->integer('saves_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mini_shops');
    }
};
