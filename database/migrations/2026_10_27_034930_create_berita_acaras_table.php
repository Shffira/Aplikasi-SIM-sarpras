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
        Schema::create('berita_acara', function (Blueprint $table) {
            $table->id();
            $table->string('no_berita_acara', 100)->unique();

            $table->foreignId('user_pembuat_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->foreignId('sarana_id')
                ->constrained('sarana')
                ->restrictOnDelete();

            $table->enum('jenis_tindakan', [
                'perbaikan',
                'pemeliharaan',
                'penghapusan',
            ]);

            $table->text('keterangan');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_acaras');
    }
};
