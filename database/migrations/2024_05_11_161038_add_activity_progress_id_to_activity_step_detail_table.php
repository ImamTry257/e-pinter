<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('activity_step_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('activity_progress_id')->nullable(true)->after('id');

            $table->dropColumn('user_group_id');
            $table->dropColumn('activity_master_id');
            $table->dropColumn('activity_step_id');

            $table->foreign('activity_progress_id')->references('id')->on('activity_step_progress');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_step_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('user_group_id')->after('id');
            $table->unsignedBigInteger('activity_master_id')->after('user_group_id');
            $table->unsignedBigInteger('activity_step_id')->after('activity_master_id');

            $table->dropForeign('activity_step_progress_activity_progress_id_foreign');

            $table->dropColumn('activity_progress_id');

            $table->foreign('user_group_id')->references('id')->on('user_group');
            $table->foreign('activity_master_id')->references('id')->on('activity_master');
            $table->foreign('activity_step_id')->references('id')->on('activity_step');

        });
    }
};
