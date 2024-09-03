<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookIssue;
use App\Models\Course;
use App\Models\Notice;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $courses=Course::all();
        $books = Book::with('bookIssue')->orderBy("id","desc")->limit(4)->get();

        $issuedbooks=BookIssue::where('user_id','=',request()->user()->id)->get();
        $requestbooks=Transaction::where('user_id','=',request()->user()->id)->where('status','=','pending')->get();
       $notices=Notice::limit(4)->get()->sortDesc();
        return view('dashboard',compact('courses','books','issuedbooks','requestbooks','notices'));
    }
}
