<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'nip' => null,
            'name' => 'Budi Santoso',
            'email' => 'admin@inspect.com',
            'role' => 'admin',
            'jabatan' => 'Admin Utama',
            'password' => Hash::make('password'),
        ]);

        // Petugas
        User::create([
            'nip' => '199001012020011001',
            'name' => 'Siti Aminah',
            'email' => 'siti@inspect.com',
            'role' => 'petugas',
            'jabatan' => 'Staf Arsip',
            'password' => Hash::make('password'),
        ]);
    }
}
