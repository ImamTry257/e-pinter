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
        Schema::create('question_answer_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('question_master_id');
            $table->longText('answer')->comment('jawaban siswa, data string json');
            $table->longText('answer_with_reason')->comment('jawaban siswa untuk pilihan ganda alasan, data sting json');
            $table->integer('is_answered')->comment('flaq untuk apakah sudah dijawab atau belum');
            $table->integer('score')->comment('nilai dari hasil jawaban dibandingkan dengan kunci jawaban siswa');
            $table->integer('status')->default(1);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('question_master_id')->references('id')->on('question_master');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_answer_user');
    }
};
