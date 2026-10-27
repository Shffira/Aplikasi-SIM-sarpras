<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Administrator',
                'email' => 'admin@simsarpras.test',
                'role' => 'admin',
            ],
            [
                'name' => 'Petugas Sarpras',
                'email' => 'petugas@simsarpras.test',
                'role' => 'petugas_sarpras',
            ],
            [
                'name' => 'Guru',
                'email' => 'guru@simsarpras.test',
                'role' => 'guru',
            ],
        ];

        foreach ($users as $data) {
            User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('Sarpras123!'),
                    'role' => $data['role'],
                ]
            );
        }
    }
}
