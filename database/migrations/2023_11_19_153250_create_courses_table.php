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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->string('code');
            $table->unsignedInteger('credit_points');
            $table->text('description')->nullable(); 
            $table->integer('duration'); 
            $table->decimal('cost_per_hour', 8, 2); 
            $table->string('course_nature');
             
            $table->foreignId('level_id')->references('id')->on('levels')->cascadeOnDelete();
            $table->foreignId('semester_id')->references('id')->on('semesters')->cascadeOnDelete();
            $table->timestamps(); 
        });

       
    }
  
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
        
    }
};
