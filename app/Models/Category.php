<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded;

    function course(){
        return $this->belongsTo(Course::class);
    }
    function book(){
        return $this->belongsTo(Book::class,'book_isdn','isdn');
    }
    function semester(){
        return $this->belongsTo(Semester::class);
    }
}
