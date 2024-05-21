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
        Schema::create('papers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->unsignedInteger('credit_points');
            $table->foreignId('level_id')->references('id')->on('levels')->cascadeOnDelete();
            $table->foreignId('semester_id')->references('id')->on('semesters')->cascadeOnDelete();
            $table->foreignId('specialty_id')->references('id')->on('specialties')->cascadeOnDelete(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('papers');
    }
};
