<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BookIssue;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserTransactionController extends Controller
{
    public function index(){
        $transactions=BookIssue::where('user_id','=',request()->user()->id)->get();
        return view('transaction.index',compact('transactions'));
    }
    
    public function bookRequests(Request $request){
        $transactions=Transaction::where('user_id','=',request()->user()->id)->where('status','=','pending')->get();
        
        return view('transaction.book_requests',compact('transactions'));

    }

    public function destroy(Request $request)
    {
        $book = Transaction::where('user_id','=',$request->user_id)->where('book_id','=',$request->book_id)->get();
        Transaction::destroy($book);
        return Redirect::back();
    }
}
