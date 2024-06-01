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
        Schema::create('galeri', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('instansi_id')->unsigned();
            $table->string('gambar');
            $table->timestamps();

            $table->foreign('instansi_id')->references('id')->on('instansi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri');
    }
};
