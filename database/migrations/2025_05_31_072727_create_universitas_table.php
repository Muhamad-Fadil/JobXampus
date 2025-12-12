<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitasTable extends Migration
{
   public function up(): void
{
    Schema::create('universitas', function (Blueprint $table) {
        $table->increments('id_universitas');
        $table->string('nama_universitas', 50);
        $table->string('email', 255)->unique(); // Pastikan email unik
        $table->string('password'); 
        $table->text('alamat')->nullable();
        $table->text('deskripsi')->nullable();
        $table->string('alamat_website', 255)->nullable();
        $table->string('logo', 100)->nullable();
        $table->string('kota', 100)->nullable();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('universitas');
    }
}

