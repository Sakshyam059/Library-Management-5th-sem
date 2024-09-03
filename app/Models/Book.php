<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded=[];

    function category(){
        return $this->belongsTo(Category::class);
    }
    function semester(){
        return $this->belongsTo(Semester::class);
    }
    function bookIssue(){
        return $this->belongsTo(BookIssue::class,'id','book_id');
    }
    function user(){
        return $this->belongsTo(User::class)->withDefault([
            'id'=>request()->user()->id
        ]);
    }
    function transaction(){
        return $this->belongsTo(Transaction::class,'id','book_id');
    }
}
