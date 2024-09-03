<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookIssue;
use App\Models\Category;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index(Request $request){
        
        $searchcourse = Course::where('course','=',$request->course_name)->first();
        $semesters=Semester::all();
        $course=$searchcourse;
        return view('semester.index',compact('semesters','course'));
    }
    public function book(Request $request){
        $categories = Category::where('course_id', '=', $request->course_id)
        ->where('semester_id', '=', $request->sem_id)->get();
        $books=Book::all();
        $issuedbooks=BookIssue::where('user_id','=',request()->user()->id)->get();
        $requestbooks=Transaction::where('user_id','=',request()->user()->id)->where('status','=','pending')->get();
       
        return view('semester.book',compact('categories','books','issuedbooks','requestbooks'));
    }
}
