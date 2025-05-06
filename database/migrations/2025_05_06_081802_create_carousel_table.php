<?php

// database/migrations/xxxx_xx_xx_create_carousel_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselTable extends Migration
{
    public function up()
    {
        Schema::create('carousel', function (Blueprint $table) {
            $table->id('id_carousel');
            $table->string('judul');
            $table->string('gambar'); // path gambar
            $table->string('link')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('nonaktif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carousel');
    }
}

