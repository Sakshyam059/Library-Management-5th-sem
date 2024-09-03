@extends('layouts.app')
@section('title')
    Category
@endsection
@section('content')
    <section class="p-3 lg:p-8  h-full">
        <h1 class="text-xl lg:text-3xl font-semibold ">Category</h1>
        <div class="grid lg:grid-cols-3 gap-4 lg:gap-8 my-4 lg:my-8 ">
            @foreach ($courses as $course)    
                <a href="{{route('semester.index',$course->id)}}" class="bg-white  shadow-sm shadow-black/20 dark:shadow-black/40 p-8 lg:p-10 rounded-lg hover:bg-zinc-100">
                    <h1 class="text-3xl font-bold">{{$course->course}}</h1>
                </a>
            @endforeach
            
        </div>
    </section>
@endsection