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
        Schema::create('student_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->foreignId('level_id')->references('id')->on('levels')->cascadeOnDelete();
            $table->string('academic_year');
            $table->integer('pass_mark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_levels');
    }
};
