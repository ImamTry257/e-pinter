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
        Schema::table('questionniare_master', function (Blueprint $table) {
            $table->string('statement_type', 30)->default('positive')->nullable(false)->comment('tipe pernyataan, bisa bernilai positive atau negative')->after('number_string');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questionniare_master', function (Blueprint $table) {
            $table->dropColumn('statement_type');
        });
    }
};
