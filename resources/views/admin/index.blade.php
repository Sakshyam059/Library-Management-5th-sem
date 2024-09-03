@extends('layouts.app')
@section('content')
<section class="h-full min-h-screen p-3 bg-white lg:p-8">
    <h1 class="text-xl font-semibold lg:text-3xl ">Admin Manager</h1>
    <div class="grid gap-4 my-4 cursor-pointer lg:grid-cols-3 lg:gap-8 lg:my-8">
       
            <a href="{{route('admin.manage_user')}}" class="p-8 rounded-lg shadow-sm shadow-black/20 dark:shadow-black/40 lg:p-10 hover:bg-zinc-100">
                <span class="text-xl font-medium">Manage user</span>
            </a>
            <a href="{{route('admin.book.index')}}" class="p-8 rounded-lg shadow-sm shadow-black/20 dark:shadow-black/40 lg:p-10 hover:bg-zinc-100">
                <span class="text-xl font-medium">Manage book</span>
            </a>
            <a href="{{route('admin.notice.index')}}" class="p-8 rounded-lg shadow-sm shadow-black/20 dark:shadow-black/40 lg:p-10 hover:bg-zinc-100">
                <span class="text-xl font-medium">Manage notice</span>
            </a>
            <a href="{{route('transaction.index')}}" class="p-8 rounded-lg shadow-sm shadow-black/20 dark:shadow-black/40 lg:p-10 hover:bg-zinc-100">
                <span class="text-xl font-medium">Manage transactions</span>
            </a>
       
        
    </div>
</section>
@endsection