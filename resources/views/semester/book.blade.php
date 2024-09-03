@extends('layouts.app')
@section('content')
<section class="bg-white min-h-screen p-4">
        <header class="relative  pt-2 pb-6 ">
            <h1 class="inline-flex text-3xl text-gray-700 font-extrabold">{{ request()->semester }} Semester 
            </h1>
            <small class="text-blue-600 text-xs">{{request()->course_name}}</small>
        </header>


        <div class="grid grid-cols-4 gap-6">

            @foreach ($categories as $category)
                <div class="bg-white p-2 py-3 lg:p-3 mb-4  flex flex-col  shadow-sm shadow-black/40 rounded">

                    <img src="{{ asset('images/book/' . $category->book->image) }}" alt="" class="h-56 w-full">
                    <h2 class="text-xs font-medium  pt-2 pb-1 ">{{ $category->book->title }}</h2>
                    @if ($category->book->stock > 0)
                        <small class="text-green-600">Available</small>
                    @else
                        <small class="text-red-600">Not Available</small>
                    @endif
                    <div class="flex flex-col justify-center lg:flex-row">
                        @php
                            $check = 0;
                            $requested = 0;
                        @endphp
                        @foreach ($issuedbooks as $issuedbook)
                            @if ($issuedbook->book_id == $category->book->id)
                                @php
                                    $check = 1;
                                @endphp
                            @endif
                        @endforeach
                        @foreach ($requestbooks as $requestbook)
                            @if ($requestbook->book_id == $category->book->id)
                                @php
                                    $requested = 1;
                                @endphp
                            @endif
                        @endforeach

                        @if ($check == 1)
                            <a href="##" class="m-1 bg-gray-800 text-white text-xs px-2 py-2 rounded">Issued</a>
                        @elseif ($requested == 1)
                            <form
                                action="{{ route('user.cancel.book', ['user_id' => request()->user()->id, 'book_id' => $category->book->id]) }}"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="m-1 bg-red-600 text-white text-xs px-2 py-2 rounded">Cancel Issue</button>
                            </form>
                        @elseif($category->book->stock > 0)
                            <form
                                action="{{ route('transaction.store', ['user_id' => request()->user()->id, 'book_id' => $category->book->id]) }}"
                                method="POST">
                                @csrf
                                <button type="submit"
                                    class="m-1 bg-gradient-to-r from-orange-600 to-orange-500 text-white text-xs px-2 py-2 rounded">Issue
                                    Book</button>
                            </form>
                        @endif
                        <a href="{{ route('user.book.details', $category->book->id) }}"
                            class="m-1 bg-blue-600 text-white text-xs px-2 py-2 rounded">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
@endsection
