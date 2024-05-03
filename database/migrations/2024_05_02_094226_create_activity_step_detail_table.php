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
        Schema::create('activity_step_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_group_id');
            $table->unsignedBigInteger('activity_master_id');
            $table->unsignedBigInteger('activity_step_id');
            $table->text('answers');
            $table->integer('detail_progress');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_group_id')->references('id')->on('user_group');
            $table->foreign('activity_master_id')->references('id')->on('activity_master');
            $table->foreign('activity_step_id')->references('id')->on('activity_step');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_step_detail');
    }
};
