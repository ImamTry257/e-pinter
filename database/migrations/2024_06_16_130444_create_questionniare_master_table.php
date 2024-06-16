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
        Schema::create('questionniare_master', function (Blueprint $table) {
            $table->id();
            $table->integer('page')->comment('page untuk kuisioner');
            $table->integer('number')->comment('nomor kuisioner');
            $table->string('number_string')->comment('nomor kuisioner dalam huruf, digunakan untuk attribute name di tag input');
            $table->longText('description')->comment('isi kuisioner');
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
        Schema::dropIfExists('questionniare_master');
    }
};
