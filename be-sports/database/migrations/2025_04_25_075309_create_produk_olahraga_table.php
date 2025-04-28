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
        Schema::create('produk_olahraga', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk', 255);
            $table->text('deskripsi');
            $table->decimal('harga', 18,2);
            $table->integer('stok');
            $table->string('warna', 50);
            $table->string('ukuran');
            $table->boolean('jenis_kelamin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_olahraga');
    }
};
