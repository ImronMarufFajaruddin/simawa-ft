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
        Schema::create('anggota', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('instansi_id');
            $table->unsignedInteger('level_jabatan_id');
            $table->varchar('nama');
            $table->varchar('nim');
            $table->varchar('foto')->nullable();
            $table->timestamps();

            $table->foreign('instansi_id')->references('id')->on('instansi');
            $table->foreign('level_jabatan_id')->references('id')->on('level_jabatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
