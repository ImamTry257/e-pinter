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
        Schema::create('question_answer_key', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_master_id');
            $table->text('key_answer')->comment('kunci jawaban, data string json');
            $table->text('key_answer_with_reason')->comment('pilihan ganda yang digunakan untuk mengetahui jawaban alasan, data sting json');
            $table->integer('status')->default(1);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('question_master_id')->references('id')->on('question_master');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_answer_key');
    }
};
