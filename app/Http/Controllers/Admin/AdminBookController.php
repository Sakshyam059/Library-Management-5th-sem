<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Course;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminBookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view('admin.book.index', compact('books'));
    }

    public function create()
    {
        $books = Book::all();
        $categories = Course::all();
        $semesters = Semester::all();
        return view('admin.book.create', compact('books', 'categories', 'semesters'));
    }

    public function store(Request $request)
    {
        $book = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'isdn' => 'required',
            'edition' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable'
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $imagepath = time() . '_' . $fileName;
            $file->move(public_path('images/book/'), $imagepath);
            $book['image'] = $imagepath;
        }


        Book::create($book);

        $category = $request->validate([
            'course_id' => 'required',
            'book_isdn' => 'numeric',
            'semester_id' => 'required'
        ]);


        $category['book_isdn'] = $book['isdn'];
        foreach ($request->course_id as $k => $v) {
            $category['course_id'] = $v;
            $category['semester_id'] = $request->semester_id[$k];
            Category::create($category);
        }

        return redirect()->back()->with('success', 'Book Added Successfully');
    }

    public function edit($id)
    {
        $update_book = Book::find($id);
        $all_books = Book::all();
        $courses = Course::all();
        $semesters = Semester::all();
        $categories = Category::all();


        return view('admin.book.edit', compact('update_book', 'all_books', 'courses', 'semesters', 'categories'));
    }

    public function update(Request $request, Book $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'isdn' => 'required',
            'edition' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable'
        ]);
        $data['image'] = $id->image;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $image = time() . '_' . $filename;
            $file->move(public_path('/images/book/'), $image);
            File::delete(public_path('/images/book/' . $id->image));
            $data['image'] = $image;
        }

        $id->update($data);
        $find_category = Category::where('book_isdn', $request->isdn)->get();
       
       $category = $request->validate([
           'course_id' => 'required',
           'book_isdn' => 'numeric',
           'semester_id' => 'required'
       ]);
       $category['book_isdn'] = $data['isdn'];
       foreach ($find_category as $key => $value) {
        # code...
        $category_id=Category::find($value->id);
        foreach ($request->course_id as $k => $v) {
            $category['course_id'] = $v;
            $category['semester_id'] = $request->semester_id[$k]; 
           
            Category::updateOrCreate(
                [
                   'course_id'   =>$v,
                ],$category
                
            );
        }
        }
        return redirect()->back()->with('success', 'Image Updated Succesfully');
    }

    public function destroy(Request $request)
    {
        $book = Book::find($request->id);
        $book->delete();
        return redirect(route('admin.book.index'))->with('success','Book Deleted Successfully');
    }
}
