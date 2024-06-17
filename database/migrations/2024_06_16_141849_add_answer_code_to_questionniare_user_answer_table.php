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
        Schema::table('questionniare_user_answer', function (Blueprint $table) {
            $table->string('answer_code', 20)->after('answer')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questionniare_user_answer', function (Blueprint $table) {
            $table->dropColumn('answer_code');
        });
    }
};