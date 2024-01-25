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
        Schema::create('mini_shop_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('email');
            $table->string('post_url');
            $table->integer('likesValue');
            $table->integer('commentsValue');
            $table->integer('sharesValue');
            $table->integer('savesValue');
            $table->integer('likesUnits');
            $table->integer('commentsUnits');
            $table->integer('sharesUnits');
            $table->integer('savesUnits');
            $table->integer('total');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mini_shop_orders');
    }
};
