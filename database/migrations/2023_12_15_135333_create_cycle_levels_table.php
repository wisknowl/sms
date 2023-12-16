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
        Schema::create('cycle_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cycle_id')->references('id')->on('cycles')->cascadeOnDelete(); 
            $table->foreignId('level_id')->references('id')->on('levels')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cycle_levels');
    }
};
