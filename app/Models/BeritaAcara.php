<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    protected $table = 'berita_acara';

    protected $fillable = [
        'no_berita_acara',
        'user_pembuat_id',
        'sarana_id',
        'jenis_tindakan',
        'keterangan',
        'tanggal',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    public function pembuat()
    {
        return $this->belongsTo(
            User::class,
            'user_pembuat_id'
        );
    }

    public function sarana()
    {
        return $this->belongsTo(Sarana::class, 'sarana_id');
    }
}