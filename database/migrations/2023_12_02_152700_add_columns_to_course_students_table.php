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
        Schema::table('course_students', function (Blueprint $table) {
            $table->decimal('ca_marks', 3, 2)->default(0);
            $table->decimal('exam_marks', 3, 2)->default(0);
            $table->decimal('average', 3, 2)->default(0);
            $table->integer('earned_credit')->default(0);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_students', function (Blueprint $table) {
            $table->dropColumn('ca_marks');
            $table->dropColumn('exam_marks');
            $table->dropColumn('average');
            $table->dropColumn('earned_credit');
        });
    }
};
