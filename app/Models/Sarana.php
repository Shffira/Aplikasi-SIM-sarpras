<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sarana extends Model
{
    use HasFactory;

    protected $table = 'sarana';

    protected $fillable = [
        'kode_sarana',
        'nama_sarana',
        'kategori_id',
        'ruangan_id',
        'kondisi',
        'status_perbaikan',
        'jumlah',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(
            KategoriSarana::class,
            'kategori_id'
        );
    }

    public function ruangan(): BelongsTo
    {
        return $this->belongsTo(
            Ruangan::class,
            'ruangan_id'
        );
    }

    public function laporanSarana(): HasMany
    {
        return $this->hasMany(
            LaporanSarana::class,
            'sarana_id'
        );
    }

    public function beritaAcara(): HasMany
    {
        return $this->hasMany(
            BeritaAcara::class,
            'sarana_id'
        );
    }
}