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
            $table->string('umkm_id');
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('harga');
            $table->string('stok');
            $table->string('berat');
            $table->string('satuan'); 
            $table->string('kategori_id'); 
            $table->string('batch_foto_id');
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
