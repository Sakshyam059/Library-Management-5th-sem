<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookIssue;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserBookController extends Controller
{
    public function details($details){
        $books=Book::find($details);
        $otherbooks=Book::limit(4)->get()->sortDesc();
        $issuedbooks=BookIssue::where('user_id','=',request()->user()->id)->get();
        $requestbooks=Transaction::where('user_id','=',request()->user()->id)->where('status','=','pending')->get();
        return view('book.details',compact('books','otherbooks','issuedbooks','requestbooks'));
    }
 /*   public function issueBook(Request $request,$book_id){
        $book=$request->all();
        $book['user_id']=request()->user()->id;
        $book['book_id']=$book_id;

   
        
        $books = Book::find($book_id);
        $books['stock']=$books->stock-1;
        $books->save();
        return redirect(route('book.index'));
    }*/
    
    public function destroy(Request $request,BookIssue $id)
    {
        $id->delete();
        $bid=$request->book_id;
        $books = Book::find($bid);
        $books['stock']=$books->stock+1;
        $books->save();
        return Redirect::route('dashboard');
    }
}
