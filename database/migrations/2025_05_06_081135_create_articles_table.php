<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('id_articles'); // BIGINT dan Primary Key
            $table->string('judul');
            $table->longText('konten_artikel');
            $table->string('gambar')->nullable(); // jika gambar tidak wajib
            $table->date('tanggal_publish')->nullable();
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
}