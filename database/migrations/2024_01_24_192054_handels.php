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
        Schema::create('handels', function (Blueprint $table) {

            $table->id();
            $table->string('handel');
            $table->foreignId('team_id');
            $table->unique(['handel', 'team_id']);

        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('handels');
    }
};
