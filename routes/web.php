<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\BookIssueController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\User\UserBookController;
use App\Http\Controllers\User\UserTransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/aboutus', function () {
    return view('about');
})->name('about');



Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    
    Route::get('/notice',[NoticeController::class,'index'])->name('notice.index');
    Route::get('/notice/{id}/details',[NoticeController::class,'details'])->name('notice.details');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'userDetail'])->name('profile.detail');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/category',[CategoryController::class,'index'])->name('category.index');

    Route::get('/books',[BookController::class,'index'])->name('book.index');
    
    Route::get('/books/{detail}/details',[UserBookController::class,'details'])->name('user.book.details');


    Route::get('/course/{course_name}',[SemesterController::class,'index'])->name('semester.index');
    Route::get('/course/{course_name}/{sem_id}',[SemesterController::class,'book'])->name('semester.book');
   
   
    Route::get('/myBooks',[UserTransactionController::class,'index'])->name('user.books.index');
    Route::get('/myBooks/requests',[UserTransactionController::class,'bookRequests'])->name('user.books.request');
    Route::delete('/book/cancel-issue', [UserTransactionController::class, 'destroy'])->name('user.cancel.book');

    
    Route::get('/book/search',[SearchController::class,'result'])->name('book.search.result');
    
    Route::post('/transaction/{book_id}',[TransactionController::class,'store'])->name('transaction.store');
    Route::delete('/transaction/{id}/delete', [TransactionController::class, 'destroy'])->name('transaction.delete');

   
    Route::group(['middleware' => 'user.type:admin'], function() {
        
    Route::get('/admin/manage',[AdminController::class,'index'])->name('admin.manage');

    Route::get('/addbook',[AdminBookController::class,'create'])->name('admin.book.create');
    Route::post('/storebook',[AdminBookController::class,'store'])->name('admin.book.store');
    Route::get('/book/{id}/edit',[AdminBookController::class,'edit'])->name('admin.book.edit');
    Route::post('/book/{id}/update',[AdminBookController::class,'update'])->name('admin.book.update');
    Route::delete('/book/{id}/delete', [AdminBookController::class, 'destroy'])->name('book.delete');

    Route::get('/manageuser',[AdminController::class,'user'])->name('admin.manage_user');
    Route::get('/manageUser/{id}/edit',[AdminController::class,'userProfileEdit'])->name('admin.user_edit');
    Route::post('/manageUser/{id}/updateRole',[AdminController::class,'userProfileUpdate'])->name('admin.user_update');
    Route::post('/manageUser/{id}/updatePassword',[AdminController::class,'userPasswordUpdate'])->name('admin.user_update_password');
    Route::delete('/manageUser/{id}/userDelete', [AdminController::class, 'userDelete'])->name('admin.user_delete');

    Route::get('/managebook',[AdminBookController::class,'index'])->name('admin.book.index'); 

    Route::post('/bookissue/{book_id}',[BookIssueController::class,'store'])->name('book.issue');

     
    Route::get('/transactions',[TransactionController::class,'index'])->name('transaction.index');
    
    Route::get('/{id}/transactions',[TransactionController::class,'userBook'])->name('user.transactionDetails.index');
    
    
    Route::delete('/book/{id}/return',[UserBookController::class,'destroy'])->name('book.return');
    
    Route::get('/admin/notice-control',[NoticeController::class,'adminNoticeIndex'])->name('admin.notice.index');
    Route::get('/admin/notice/create',[NoticeController::class,'create'])->name('admin.notice.create');
    Route::post('/notice/store',[NoticeController::class,'store'])->name('admin.notice.store');
    Route::get('/admin/notice/{id}/edit',[NoticeController::class,'edit'])->name('admin.notice.edit');
    Route::post('/notice/{id}/update',[NoticeController::class,'update'])->name('admin.notice.update');
    Route::delete('/notice/{id}/delete', [NoticeController::class, 'destroy'])->name('notice.delete');
   

    });


});

require __DIR__.'/auth.php';
