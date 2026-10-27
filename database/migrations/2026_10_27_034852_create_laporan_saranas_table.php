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
        Schema::create('laporan_sarana', function (Blueprint $table) {
            $table->id();

            $table->foreignId('murid_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->foreignId('sarana_id')
                ->constrained('sarana')
                ->restrictOnDelete();

            $table->foreignId('ruangan_id')
                ->constrained('ruangan')
                ->restrictOnDelete();

            $table->text('deskripsi_kerusakan');
            $table->string('foto', 255)->nullable();

            $table->enum('status', [
                'pending',
                'dalam_perbaikan',
                'selesai',
                'ditolak',
            ])->default('pending');

            $table->timestamp('tanggal_laporan')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_saranas');
    }
};
