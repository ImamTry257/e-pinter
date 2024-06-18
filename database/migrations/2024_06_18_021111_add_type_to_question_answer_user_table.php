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
        Schema::table('question_answer_user', function (Blueprint $table) {
            $table->string('type', 20)->default('pre-test')->nullable(true)->comment('tipe pengerjaan, bernilai pre-test atau post-test')->after('question_master_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('question_answer_user', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
