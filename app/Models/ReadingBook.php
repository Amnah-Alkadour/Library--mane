<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadingBook extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'user_id',
        'BookingPeriod',
    ];
     // علاقة "متعدد إلى واحد" مع الكتب
     public function book()
     {
         return $this->belongsTo(Book::class, 'book_id');
     }
 
     // علاقة "متعدد إلى واحد" مع المستخدمين
     public function user()
     {
         return $this->belongsTo(User::class, 'user_id');
     }
}
