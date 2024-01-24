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
        Schema::create('shortend_links', function (Blueprint $table) {

            $table->id();
            $table->foreignId('handel_id')->nullable();
            $table->string('original_url');
            $table->integer('click_count')->default(0);

            $table->string('slug')->unique();
            $table->text('pixel_data')->nullable();
            $table->unique(['slug', 'handel_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('shortend_links');

    }
};
