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
        Schema::create('comment_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('content_master_id');
            $table->integer('parent_id')->default(0)->comment('nilainya adalah id comment_detail');
            $table->longText('content')->nullable(true);
            $table->integer('count_readed')->default(0);
            $table->string('status')->default('ACTIVE')->comment('bernilai ACTIVE atau NONACTIVE');
            $table->integer('replayed_by')->comment('akan ada nilainya jika dibalasan komen ini dibales lagi oleh user');
            $table->integer('created_by');
            $table->integer('updated_by')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('content_master_id')->references('id')->on('comment_master');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_detail');
    }
};
