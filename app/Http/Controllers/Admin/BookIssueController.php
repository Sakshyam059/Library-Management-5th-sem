<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookIssue;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BookIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        $transaction = $request->validate([
            'user_id','book_id'
        ]);
        $transaction['user_id'] = $request->user_id;
        $transaction['book_id'] = $id;

        BookIssue::create($transaction);

        $data=$request->validate([
            'user_id','book_id','status'
        ]);
        $transaction=Transaction::find($request->tid);
        $transaction->status="approved";
        $transaction->update($data);

        $stock=$request->validate([
            'stock'
        ]);
        $book=Book::find($id);
        $book['stock'] = $book->stock -1;
        $book->update($stock);
       
        return redirect(route('transaction.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(BookIssue $bookIssue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookIssue $bookIssue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookIssue $bookIssue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookIssue $bookIssue)
    {
        //
    }
}
