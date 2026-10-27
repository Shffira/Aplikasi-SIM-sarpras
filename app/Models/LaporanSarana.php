<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanSarana extends Model
{
    protected $table = 'laporan_sarana';

    protected $fillable = [
        'murid_id',
        'sarana_id',
        'ruangan_id',
        'deskripsi_kerusakan',
        'foto',
        'status',
        'tanggal_laporan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_laporan' => 'datetime',
        ];
    }

    public function murid(): BelongsTo
    {
        return $this->belongsTo(User::class, 'murid_id');
    }

    public function sarana(): BelongsTo
    {
        return $this->belongsTo(Sarana::class, 'sarana_id');
    }

    public function ruangan(): BelongsTo
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
}
