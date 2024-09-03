@extends('layouts.app')
@section('content')
<header class="bg-white px-4 py-4 lg:py-8">
    <h1 class="text-xl lg:text-3xl font-semibold">{{$course->course}} Semesters</h1>
</header>
    <section class="p-3 lg:px-4 ">
        <div class="grid lg:grid-cols-4 my-4 lg:my-2 gap-4">
            @foreach ($semesters as $semester)  
                <a href="{{route('semester.book',['course_id'=>$course->id,'course_name'=>$course->course,'sem_id'=>$semester->id,'semester'=>$semester->semester])}}" class="bg-white shadow-sm shadow-black/20 dark:shadow-black/40 p-8 rounded-lg text-gray-700 text-xl hover:bg-zinc-100">{{$semester->semester}}  Semester</a>
                
            @endforeach
        </div>
    </section>
@endsection