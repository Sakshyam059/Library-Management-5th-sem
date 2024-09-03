@extends('layouts.app')
@section('title')
    All Books
@endsection
@section('content')
<section class="bg-white min-h-screen px-5  lg:pt-3 text-xs lg:text-base">
        <header class="relative bg-white py-3 lg:py-6 lg:pb-10">
            <h1 class="lg:inline-flex py-2 text-lg lg:text-3xl text-gray-700 font-extrabold">All Books</h1>
            <div class=" lg:absolute  top-6 right-6">
                <form action="{{ route('book.search.result') }}" method="POST">
                    @csrf
                    <input type="search" class=" w-64 h-10 rounded-md bg-stone-100" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                </form>
            </div>
        </header>

        <div class="grid grid-cols-2 gap-2 lg:grid-cols-4 lg:gap-8">
            @foreach ($books as $data)
            
            <div 
            class="bg-white p-2  lg:p-3 mb-6  flex flex-col  shadow-sm shadow-black/40 rounded">
            <a href="{{route('user.book.details',$data->id)}}">
                    <img src="{{ asset('images/book/' . $data->image) }}" alt="" class="h-28 lg:h-[218px] w-full">
                    <div class="whitespace-nowrap  pb-2 mx-3 overflow-hidden">
                        <h2 class="text-xs font-medium  pt-2 pb-1 ">{{ $data->title }}</h2>
                        @if ($data->stock>0)  
                        <small class="text-green-600">Available</small>
                        @else
                        <small class="text-red-600">Not Available</small>
                            
                        @endif
                    </div>
                    <div class=" flex flex-col lg:flex-row lg:justify-center items-center">
                        @php
                            $check = 0;
                            $requested = 0;
                        @endphp
                        @foreach ($issuedbooks as $issuedbook)
                            @if ($issuedbook->book_id == $data->id)
                                @php
                                    $check = 1;
                                @endphp
                            @endif
                        @endforeach
                        @foreach ($requestbooks as $requestbook)
                            @if ($requestbook->book_id == $data->id)
                                @php
                                    $requested = 1;
                                @endphp
                            @endif
                        @endforeach

                        @if ($check == 1)
                            <a href="##"
                                class=" m-1 bg-gray-800 text-white text-[10px] lg:text-xs px-2 py-2 rounded">Issued</a>
                        @elseif ($requested == 1)
                            <form
                                action="{{ route('user.cancel.book', ['user_id' => request()->user()->id, 'book_id' => $data->id]) }}"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="m-1 bg-red-600 text-white text-[10px] lg:text-xs px-2 py-2 rounded">Cancel
                                    Issue</button>
                            </form>
                        @else
                            <form
                                action="{{ route('transaction.store', ['user_id' => request()->user()->id, 'book_id' => $data->id]) }}"
                                method="POST">
                                @csrf
                                <button type="submit"
                                    class="text-[10px] m-1 bg-gradient-to-r from-orange-600 to-orange-500 text-white lg:text-xs px-4 lg:px-2 py-2 rounded">Issue
                                    Book</button>
                            </form>
                        @endif

                        <a href="{{ route('user.book.details', $data->id) }}"
                            class="hidden lg:block text-[10px] m-1 bg-blue-600 text-white lg:text-xs px-2 py-2 rounded">Details</a>
                    </div>
                </a>
                </div>
            @endforeach
        </div>
        {!! $books->render() !!}
    </section>
@endsection
