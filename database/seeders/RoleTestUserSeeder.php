<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleTestUserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Administrator
        $admin = User::firstOrCreate(
            ['email' => 'admin@manajemenbuku.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('AdminBuku2026!'),
            ]
        );

        $admin->syncRoles(['Admin']);


        // Akun Dosen
        $dosen = User::firstOrCreate(
            ['email' => 'dosen@manajemenbuku.com'],
            [
                'name' => 'Dosen Penguji',
                'password' => Hash::make('DosenBuku2026!'),
            ]
        );

        $dosen->syncRoles(['Dosen']);


        // Akun Mahasiswa
        $mahasiswa = User::firstOrCreate(
            ['email' => 'mahasiswa@manajemenbuku.com'],
            [
                'name' => 'Mahasiswa Penguji',
                'password' => Hash::make('MahasiswaBuku2026!'),
            ]
        );

        $mahasiswa->syncRoles(['Mahasiswa']);
    }
}
