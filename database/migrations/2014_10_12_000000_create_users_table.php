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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama',32);
            $table->string('alamat',128);
            $table->string('email',32)->unique();
            $table->string('password', 128);
            $table->enum('jkl',['L','P']);
            $table->string('tmp_lahir', 20);
            $table->date('tgl_lahir');
            $table->string('foto')->nullable();
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
