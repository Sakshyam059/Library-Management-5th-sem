@extends('layouts.app')
@section('title')
    Notices
@endsection
@section('content')
<section class="bg-white min-h-screen px-5  lg:pt-3 text-xs lg:text-base">
        <header class=" py-4 lg:py-8">
            <h1 class="text-3xl text-gray-700 font-extrabold">Notices</h1>
        </header>

        <div class="grid gap-6 lg:grid-cols-4 xl:gap-x-12 ">
            @foreach ($notices as $notice)
            <div class="mb-6 lg:mb-0 bg-white shadow-sm shadow-black/40 rounded-md">
                <a href="{{route('notice.details',$notice->id)}}" class=" relative mb-6 overflow-hidden rounded-lg bg-cover bg-no-repeat shadow-lg ">
                    <img src="{{asset('images/notice/'.$notice->image)}}" class="w-full h-48 p-5" alt="Louvre" />
                    <div class="p-4 pt-2 ">
                        <h5 class=" font-bold">{{$notice->title}}</h5>
                        <p class="text-xs pb-2">
                            Published <u>{{$notice->created_at}}</u>
                        </p>
                        
                        <a href="{{route('notice.details',$notice->id)}}" class="bg-blue-600 text-white px-4 py-2 rounded-sm text-xs">Read More</a>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
@endsection
