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
        Schema::create('question_master', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->comment('nomor soal');
            $table->longText('description')->comment('isi soal');
            $table->longText('options')->comment('pilihan ganda, data sting json');
            $table->longText('options_with_reason')->comment('pilihan ganda yang digunakan untuk mengetahui jawaban alasan, data sting json');
            $table->integer('status')->default(1);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_master');
    }
};
