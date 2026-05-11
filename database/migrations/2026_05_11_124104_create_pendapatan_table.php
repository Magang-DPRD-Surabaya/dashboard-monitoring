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
        Schema::create('pendapatan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('mitra_id')
                ->constrained('mitra_kerja')
                ->cascadeOnDelete();

            $table->foreignId('tahun_id')
                ->constrained('tahun_anggaran')
                ->cascadeOnDelete();

            $table->foreignId('created_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->decimal('target', 15, 2);
            $table->decimal('realisasi', 15, 2);

            $table->decimal('persentase', 5, 2);

            $table->foreignId('status_id')
                ->constrained('status_capaian');

            $table->foreignId('kondisi_id')
                ->constrained('kondisi_lingkungan');

            $table->text('catatan')->nullable();

            $table->timestamps();

            $table->unique(['mitra_id', 'tahun_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendapatan');
    }
};
