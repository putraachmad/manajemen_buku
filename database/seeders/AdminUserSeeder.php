<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@manajemenbuku.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('AdminBuku2026!'),
            ]
        );

        // Memberikan Role Admin
        $admin->assignRole('Admin');
    }
}
