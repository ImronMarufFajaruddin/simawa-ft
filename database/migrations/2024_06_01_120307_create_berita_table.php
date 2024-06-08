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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id');
            $table->unsignedInteger('kategori_berita_id');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('konten');
            $table->string('gambar')->nullable();
            $table->string('dokumen')->nullable();
            $table->enum('status', ['Publish', 'Draft'])->default('Draft');
            $table->date('tanggal_publish')->default(now());
            $table->timestamps();

            // Define foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kategori_berita_id')->references('id')->on('kategori_berita')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['kategori_berita_id']);
        });
        Schema::dropIfExists('berita');
    }
};
