<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookIssue extends Model
{
    use HasFactory;
    protected $guarded;

    function book(){
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
    
    function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
