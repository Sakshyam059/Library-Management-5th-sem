<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookIssue;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function index(){
        $books = Book::with('bookIssue')->paginate(4);
        $issuedbooks=BookIssue::where('user_id','=',request()->user()->id)->get();
        $requestbooks=Transaction::where('user_id','=',request()->user()->id)->where('status','=','pending')->get();
        
        return view('book.index',compact('books','issuedbooks','requestbooks'));
    }
}
