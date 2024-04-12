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
        Schema::create('specialty_tranches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specialty_id')->references('id')->on('specialties')->cascadeOnDelete();
            $table->foreignId('tranche_id')->references('id')->on('tranches')->cascadeOnDelete(); 
            $table->integer('tranche_amount')->default(0);
            $table->string('period');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialty_tranches');
    }
};
