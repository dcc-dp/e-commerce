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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('umkm_id')->constrained();
            $table->string('nama');
            $table->string('deskripsi');
            $table->integer('harga');
            $table->integer('stok');
            $table->integer('berat');
            $table->string('satuan'); 
            $table->foreignId('kategori_id')->constrained(); 
            $table->foreignId('batch_foto_id')->constrained();
            $table->string('rating')->default(0);
            $table->integer('pembelian')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
