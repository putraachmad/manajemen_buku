<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Teknologi',
                'description' => 'Buku teknologi, komputer, dan informatika.',
            ],
            [
                'name' => 'Pendidikan',
                'description' => 'Buku pendidikan dan pembelajaran.',
            ],
            [
                'name' => 'Fiksi',
                'description' => 'Novel, cerita pendek, dan karya fiksi.',
            ],
            [
                'name' => 'Nonfiksi',
                'description' => 'Buku pengetahuan dan informasi umum.',
            ],
            [
                'name' => 'Sejarah',
                'description' => 'Buku sejarah dan kebudayaan.',
            ],
            [
                'name' => 'Agama',
                'description' => 'Buku keagamaan dan spiritualitas.',
            ],
            [
                'name' => 'Ekonomi',
                'description' => 'Buku ekonomi, bisnis, dan manajemen.',
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::firstOrCreate(
                ['name' => $categoryData['name']],
                ['description' => $categoryData['description']]
            );
        }

        $this->command->info('7 kategori buku berhasil disiapkan.');
    }
}
