<?php

namespace Database\Seeders;

use App\Models\ReadingBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReadingBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // إضافة البيانات إلى جدول reading_books
         ReadingBook::create([
            'book_id' => 1,
            'user_id' => 1, // تأكد من وجود مستخدم بهذه الـ id في جدول users
            'BookingPeriod' => '2024-09-17',
        ]);

        ReadingBook::create([
            'book_id' => 2,
            'user_id' => 2, // تأكد من وجود مستخدم بهذه الـ id في جدول users
            'BookingPeriod' => '2024-09-18',
        ]);
    }
}
