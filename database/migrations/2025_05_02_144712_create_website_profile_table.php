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
        Schema::create('website_profile', function (Blueprint $table) {
            $table->id();
            $table->string('nama_website');
            $table->string('logo_website')->nullable(); // untuk path file gambar
            $table->longText('tentang_kami')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_profile');
    }
};
