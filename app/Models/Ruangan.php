<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangan';

    protected $fillable = [
        'kode_ruangan',
        'nama_ruangan',
        'lokasi',
    ];

    public function sarana(): HasMany
    {
        return $this->hasMany(Sarana::class, 'ruangan_id');
    }

    public function laporanSarana(): HasMany
    {
        return $this->hasMany(LaporanSarana::class, 'ruangan_id');
    }
}