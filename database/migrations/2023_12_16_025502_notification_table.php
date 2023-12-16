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
        Schema::create('notifications', function(Blueprint $table) {
            $table->id();
            $table->text('isi')->nullable(false);
            $table->timestamp('waktu_notifikasi')->nullable(false);
            $table->enum('status', ['unread', 'read'])->nullable(false)->default('unread');
            $table->unsignedBigInteger('id_user')->nullable(false);
            $table->unsignedBigInteger('id_has_user')->nullable(false);
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_has_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
