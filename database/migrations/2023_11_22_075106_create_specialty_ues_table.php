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
        Schema::create('specialty_ues', function (Blueprint $table) {
            $table->id();
            $table->foreign('specialty_id')->references('id')->on('specialties')->cascadeOnDelete();
            $table->foreign('ue_id')->references('id')->on('unite_enseignements')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialty_ues');
    }
};
