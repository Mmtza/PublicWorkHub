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
        Schema::create('team', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggota', 50)->nullable(false);
            $table->string('nim', 20)->nullable(false);
            $table->enum('role', ['Backend Developer', 'Project Manager', 'Frontend Developer', 'AFK'])->nullable(false)->default('AFK');
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
