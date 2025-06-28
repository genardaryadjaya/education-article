<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Artikel;
use Illuminate\Support\Facades\Hash;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat user admin
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@dummy.com',
            'level' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // Buat user biasa
        $user = User::factory()->create([
            'name' => 'User Biasa',
            'email' => 'user@dummy.com',
            'level' => 'user',
            'password' => Hash::make('password'),
        ]);

        // Buat 5 user random
        User::factory(5)->create(['level' => 'user']);

        // Buat 5 kategori
        $kategoris = Kategori::factory(5)->create();

        // Buat 30 artikel dummy
        Artikel::factory(30)->create();
    }
}
