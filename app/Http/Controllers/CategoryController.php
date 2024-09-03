<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('category.index',compact('courses'));
    }
}
