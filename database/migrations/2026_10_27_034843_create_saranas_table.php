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
        Schema::create('sarana', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sarana', 50)->unique();
            $table->string('nama_sarana', 150);

            $table->foreignId('kategori_id')
                ->constrained('kategori_sarana')
                ->restrictOnDelete();

            $table->foreignId('ruangan_id')
                ->constrained('ruangan')
                ->restrictOnDelete();

            $table->enum('kondisi', [
                'baik',
                'rusak_ringan',
                'rusak_berat',
            ])->default('baik');

            $table->enum('status_perbaikan', [
                'normal',
                'dalam_perbaikan',
            ])->default('normal');

            $table->integer('jumlah')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saranas');
    }
};
