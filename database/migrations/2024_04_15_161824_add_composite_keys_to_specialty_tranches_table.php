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
        Schema::table('specialty_tranches', function (Blueprint $table) {
            $table->unique(['specialty_id', 'tranche_id', 'period', 'level_id'], 'composite_unique_key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('specialty_tranches', function (Blueprint $table) {
            //
        });
    }
};
