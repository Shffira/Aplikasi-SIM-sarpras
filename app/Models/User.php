<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function laporanSarana(): HasMany
    {
        return $this->hasMany(
            LaporanSarana::class,
            'murid_id'
        );
    }

    public function beritaAcara(): HasMany
    {
        return $this->hasMany(
            BeritaAcara::class,
            'user_pembuat_id'
        );
    }
}