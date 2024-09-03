@extends('layouts.app')

@section('content')

<div class="px-4 bg-white flex gap-16 justify-between ">
    <form action="{{route('admin.notice.store')}}" method="POST" enctype="multipart/form-data" class="w-full  mx-auto border-2 py-3 px-6 mt-4">
        @csrf
        <div class="px-6 pb-1 text-2xl font-bold text-center">
            <p class="">Add a Notice</p>
        </div>
            
        <div class="mt-3">
            <label for="title" class="text-sm ">Title</label>
            <input type="text" class="h-10    my-1 w-full" name="title" id="title">    
        </div>

       <div class="mt-3 ">
            <label for="content" class="text-sm block">Content</label>
            <textarea class="w-full" name="content" id="content" cols="30" rows="10"></textarea>
        </div>

        <div class="mt-3">
            <label for="image" class="text-sm">Image</label>
            <input type="file" class="  block my-1  h-full w-full" name="image" id="image">

        </div>
            
        <input type="submit" class="w-full mt-3 bg-blue-600 text-white px-3 py-2 rounded" value="Add Notice">
            
    </form>


</div>

    
@endsection