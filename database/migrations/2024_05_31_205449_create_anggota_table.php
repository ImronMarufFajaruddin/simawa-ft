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
            $table->integer('instansi_id')->unsigned();
            $table->integer('level_jabatan_id')->unsigned();
            $table->string('nama');
            $table->string('nim');
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('instansi_id')->references('id')->on('instansi')->onDelete('cascade');
            $table->foreign('level_jabatan_id')->references('id')->on('level_jabatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->dropForeign(['instansi_id']);
            $table->dropForeign(['level_jabatan_id']);
        });
        Schema::dropIfExists('anggota');
    }
};
