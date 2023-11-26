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
            $table->text('judul')->nullable(false);
            $table->text('slug')->nullable(false);
            $table->longText('isi')->nullable(false);
            $table->timestamp('waktu_publikasi')->nullable(false);
            $table->longText('img')->nullable(true);
            $table->enum('status', ['menunggu', 'aktif', 'tidak aktif'])->nullable(false)->default('menunggu');
            $table->unsignedBigInteger('id_user')->nullable(false);
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
