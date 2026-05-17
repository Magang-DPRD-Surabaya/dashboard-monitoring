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
        Schema::create('activity_logs', function (Blueprint $table) {

            $table->id();

            // Relasi user login
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Jenis aktivitas
            $table->string('aksi');

            // Nama tabel
            $table->string('tabel');

            // ID data terkait
            $table->unsignedBigInteger('data_id');

            // Deskripsi aktivitas
            $table->text('deskripsi');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
