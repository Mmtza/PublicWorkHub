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
        Schema::create('berita', function(Blueprint $table) {
            $table->id();
            $table->string('judul', 50)->nullable(false);
            $table->longText('isi')->nullable(false);
            $table->timestamp('tgl_publikasi')->nullable(false);
            $table->string('img', 255)->nullable(false);
            $table->unsignedBigInteger('id_kategori')->nullable(false);
            $table->unsignedBigInteger('id_user')->nullable(false);
            $table->foreign('id_kategori')->references('id')->on('kategori');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
