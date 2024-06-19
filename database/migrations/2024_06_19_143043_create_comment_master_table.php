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
        Schema::create('comment_master', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_progress_id');
            $table->integer('user_id');
            $table->integer('teacher_id');
            $table->longText('content')->nullable(true);
            $table->integer('is_replayed')->default(0);
            $table->integer('count_readed')->default(0);
            $table->string('status')->default('ACTIVE')->comment('bernilai ACTIVE atau NONACTIVE');
            $table->string('commented_from')->comment('keterangan dikomen dari dashboard atau backoffice, nanti sebagai acuan untuk mengisi data user_id atau teacher_id');
            $table->integer('created_by');
            $table->integer('updated_by')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('activity_progress_id')->references('id')->on('activity_step_progress');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_master');
    }
};
