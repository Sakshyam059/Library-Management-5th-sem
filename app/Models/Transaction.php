<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded;
   
    function book(){
        return $this->belongsTo(Book::class,'book_id','id');
    }
}
