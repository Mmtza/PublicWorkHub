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
        Schema::create('loker_has_kategori', function(Blueprint $table) {
            $table->unsignedBigInteger('id_loker')->nullable(false);
            $table->unsignedBigInteger('id_kategori')->nullable(false);
            $table->foreign('id_loker')->references('id')->on('loker')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategori')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loker_has_kategori');
    }
};
