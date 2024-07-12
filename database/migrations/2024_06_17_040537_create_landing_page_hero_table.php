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
        Schema::create('landing_page_hero', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('hero_deskripsi');
            $table->string('logo')->nullable();
            $table->string('about_title');
            $table->string('about');
            $table->string('about_foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_page_hero');
    }
};
