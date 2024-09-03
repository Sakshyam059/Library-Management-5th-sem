<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookIssue;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function result(Request $request){
     

        if (request('search')!='') {
            $books = Book::where('title', 'like', '%' . $request->search . '%')->paginate(4);
        } else {
            $books = Book::paginate(12);
        }

        $issuedbooks=BookIssue::where('user_id','=',request()->user()->id)->get();
        $requestbooks=Transaction::where('user_id','=',request()->user()->id)->where('status','=','pending')->get();

        return view('book.search',compact('books','issuedbooks','requestbooks'));
    }
}
