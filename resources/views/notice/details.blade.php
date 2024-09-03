@extends('layouts.app')
@section('content')
    <section class="p-4">
        <div class="bg-white w-full flex p-4 rounded-lg shadow-lg">
            <div class="flex-1 ">
                <img src="{{asset('images/notice/'.$notice->image)}}" alt="" class="object-cover mx-auto h-96 ">
            </div>
            <div class="flex-1 bg-stone-700 text-white p-4">
                <h1 class="text-center text-3xl font-semibold">{{$notice->title}}</h1>
                <article>
                    <header class="mt-4 mb-2 text-xs"><u>{{$notice->created_at}}</u></header>
                    <p class="text-sm text-justify">{{$notice->content}}</p>
                </article>
            </div>
        </div>
    </section>

    
@endsection