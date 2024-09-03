<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookIssue;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::where('status','=','pending')->get();
        return view('admin.transaction.index',compact('transactions'));
    }

    public function userBook(Request $request, $id){
        $issuedBook = BookIssue::where('user_id','=',$id)->get();
        return view('admin.transaction.user_transaction',compact('issuedBook'));
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
    public function store(Request $request,$book_id)
    {
        $book = $request->all();
        
        $book['user_id'] = $request->user_id;
        $book['book_id'] = $book_id;
        
        Transaction::create($book);
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $id)
    {
        $id->delete();
        return Redirect::route('transaction.index');
    }
}
