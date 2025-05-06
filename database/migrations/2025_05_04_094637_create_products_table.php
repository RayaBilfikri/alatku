<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id_products');
            $table->foreignId('sub_categories_id')->constrained()->onDelete('cascade');
            $table->foreignId('contacts_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('serial_number')->nullable();
            $table->integer('year_of_build')->nullable();
            $table->integer('hours_meter')->nullable();
            $table->integer('stock')->default(0);
            $table->decimal('harga', 12, 2);
            $table->longText('deskripsi')->nullable();
            $table->string('brosur')->nullable(); // jika ini file/link
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('products');
    }
};