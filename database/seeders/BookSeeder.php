<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // إضافة البيانات إلى جدول books
         Book::create([
            'categoryId' => 1,
            'title' => 'تكنولوجيا المعلومات',
            'author' => 'مؤلف مجهول',
            'description' => 'كتاب عن أحدث تقنيات المعلومات.',
            'history' => '2024-01-01',
            'number_page' => '200',
            'price' => '20',
            'language' => 'العربية',
            'state' => 'true',
            'image' => 'ghj',
        ]);

        Book::create([
            'categoryId' => 2,
            'title' => 'الأدب العربي الحديث',
            'author' => 'نجيب محفوظ',
            'description' => 'رواية عربية حديثة.',
            'history' => '2020-05-15',
            'number_page' => '350',
            'price' => '35',
            'language' => 'العربية',
            'state' => 'true',
            'image' => 'ghj',
        ]);
    }
}
