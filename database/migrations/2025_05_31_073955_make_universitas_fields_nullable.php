<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('universitas', function (Blueprint $table) {
            $table->text('alamat')->nullable()->change();
            $table->text('deskripsi')->nullable()->change();
            $table->string('alamat_website', 255)->nullable()->change();
            $table->string('kota', 100)->nullable()->change();
            // Hapus: $table->string('password');
        });
    }

    public function down()
    {
        Schema::table('universitas', function (Blueprint $table) {
            $table->text('alamat')->nullable(false)->change();
            $table->text('deskripsi')->nullable(false)->change();
            $table->string('alamat_website', 255)->nullable(false)->change();
            $table->string('kota', 100)->nullable(false)->change();
            // Jangan drop password, karena ini kolom inti
        });
    }
};
