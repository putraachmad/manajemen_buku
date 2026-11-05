<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan cache permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Daftar seluruh permission
        $permissions = [
            'books.view',
            'books.create',
            'books.edit',
            'books.delete',
            'users.manage_roles',
        ];

        // Buat permission jika belum tersedia
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // Buat role
        $admin = Role::firstOrCreate([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        $dosen = Role::firstOrCreate([
            'name' => 'Dosen',
            'guard_name' => 'web',
        ]);

        $mahasiswa = Role::firstOrCreate([
            'name' => 'Mahasiswa',
            'guard_name' => 'web',
        ]);

        // ADMIN: seluruh hak akses
        $admin->syncPermissions([
            'books.view',
            'books.create',
            'books.edit',
            'books.delete',
            'users.manage_roles',
        ]);

        // DOSEN: melihat, menambah, dan mengedit buku
        $dosen->syncPermissions([
            'books.view',
            'books.create',
            'books.edit',
        ]);

        // MAHASISWA: hanya melihat buku
        $mahasiswa->syncPermissions([
            'books.view',
        ]);

        // Bersihkan cache kembali
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
