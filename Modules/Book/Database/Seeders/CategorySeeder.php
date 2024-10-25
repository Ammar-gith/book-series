<?php

namespace Modules\Book\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Book\App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        Category::factory()->count(10)->create();
    }
}