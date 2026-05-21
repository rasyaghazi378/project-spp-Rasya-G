<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@spp.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Petugas TU',
            'username' => 'petugas',
            'email' => 'petugas@spp.com',
            'password' => Hash::make('password'),
            'role' => 'petugas',
        ]);

        User::create([
            'name' => 'Siswa Budi',
            'username' => '123456789',
            'email' => 'budi@spp.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);
    }
}
