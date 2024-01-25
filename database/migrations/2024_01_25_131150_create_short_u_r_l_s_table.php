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
        Schema::create('short_u_r_l_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->nullable();
            $table->text('original_url');
            $table->string('short_url')->unique();
            $table->text('pixel_script')->nullable();
            $table->string('code')->unique();
            $table->string('company_name');
            $table->integer('visit_tracking')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_u_r_l_s');
    }
};
