<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoryId', // تأكد من أن هذا الحقل موجود في المصفوفة
        'title',
        'author',
        'description',
        'history',
        'number_page',
        'price',
        'language',
        'state',
        'image',
    ];
     // علاقة "متعدد إلى واحد" مع التصنيفات
     public function category()
     {
         return $this->belongsTo(Category::class, 'categoryId');
     }
 
     // علاقة "واحد إلى متعدد" بين الكتاب وعمليات القراءة
     public function readingBooks()
     {
         return $this->hasMany(ReadingBook::class, 'bookId');
     }
}
