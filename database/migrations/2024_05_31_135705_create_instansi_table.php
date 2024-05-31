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
        Schema::create('instansi', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kategori_ormawa_id');
            $table->string('nama_resmi');
            $table->string('nama_singkatan');
            $table->string('logo')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('sejarah');
            $table->string('no_telp')->nullable();
            $table->timestamps();

            $table->foreign('kategori_ormawa_id')->references('id')->on('kategori_ormawa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instansi');
    }
};
