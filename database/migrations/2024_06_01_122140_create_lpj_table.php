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
        Schema::create('lpj', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('user_id');  // Define user_id as UUID
            // $table->integer('user_id')->unsigned();
            $table->unsignedInteger('kegiatan_id');
            $table->string('dokumen');
            $table->enum('status', ['menunggu', 'revisi', 'ditolak', 'diterima'])->default('menunggu');
            $table->text('komentar')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kegiatan_id')->references('id')->on('kegiatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lpj');
    }
};
