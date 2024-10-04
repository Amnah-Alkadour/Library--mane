<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إضافة البيانات إلى جدول categories
        Category::create(['name' => 'التكنولوجيا', 'description' => 'كتب تتعلق بالتكنولوجيا.']);
        Category::create(['name' => 'الأدب', 'description' => 'كتب الأدب العربي والعالمي.']);
        Category::create(['name' => 'العلوم', 'description' => 'كتب العلوم والبحوث.']);
    }
}
