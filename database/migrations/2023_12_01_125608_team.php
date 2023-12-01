<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggota', 50)->nullable(false);
            $table->string('nim', 20)->nullable(false);
            $table->enum('role', ['backend', 'project manager', 'frontend', 'afk'])->nullable(false)->default('afk');
            $table->string('program_studi', 20)->nullable(false);
            $table->text('asal_kampus')->nullable(false);
            $table->text('foto')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team');
    }
};
