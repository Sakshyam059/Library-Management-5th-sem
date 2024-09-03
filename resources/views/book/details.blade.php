@extends('layouts.app')
@section('content')
    <section class="lg:p-4">
        <div class="bg-white w-full flex flex-col lg:flex-row p-4 rounded-lg shadow-lg">
            <div class="flex-1 ">
                <img src="{{ asset('images/book/' . $books->image) }}" alt="" class="h-80 lg:h-96 object-cover mx-auto  ">
            </div>
            <div class="flex-1">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                    <caption class="text-lg lg:text-2xl font-extrabold text-gray-700 pb-3">Book Details</caption>
                    <thead class=" text-gray-700 uppercase bg-gray-50 dark:bg-stone-100 dark:text-gray-700 border border-black">
                        <tr>
                            <th scope="col" class="text-xs lg:text-base px-3 lg:px-7 py-2 lg:py-3">
                                Title:
                            </th>
                            <td scope="col" class="text-xs lg:text-base px-3 lg:px-7 py-2 lg:py-3">
                                {{ $books->title }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col" class="text-xs lg:text-base px-3 lg:px-7 py-2 lg:py-3">
                                Author:
                            </th>
                            <td scope="col" class="text-xs lg:text-base px-3 lg:px-7 py-2 lg:py-3">
                                {{ $books->author }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col" class="text-xs lg:text-base px-3 lg:px-7 py-2 lg:py-3">
                                Edition:
                            </th>
                            <td scope="col" class="text-xs lg:text-base px-3 lg:px-7 py-2 lg:py-3">
                                {{ $books->edition }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col" class="text-xs lg:text-base px-3 lg:px-7 py-2 lg:py-3">
                                Publisher:
                            </th>
                            <td scope="col" class="text-xs lg:text-base px-3 lg:px-7 py-2 lg:py-3">
                                {{ $books->publisher }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col" class="text-xs lg:text-base px-3 lg:px-7 py-2 lg:py-3">
                                ISDN No.:
                            </th>
                            <td scope="col" class="text-xs lg:text-base px-3 lg:px-7 py-2 lg:py-3">
                                {{ $books->isdn }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col" class="text-xs lg:text-base px-3 lg:px-7 py-2 lg:py-3">
                                Availablity:
                            </th>
                            <td scope="col" class="text-xs lg:text-base px-3 lg:px-7 py-2 lg:py-3">
                                @if ($books->stock > 0)
                                    {{ $books->stock }}
                                    <b class="text-green-600  text-xs text-left py-1">(Available)</b>
                                @else
                                    <b class="text-red-500  text-xs text-left py-1">Not Available</b>
                                @endif
                            </td>
                        </tr>
                    </thead>
                </table>

                <div class="flex my-2">
                    @php
                                $check = 0;
                                $requested = 0;
                            @endphp
                            @foreach ($issuedbooks as $issuedbook)
                                @if ($issuedbook->book_id == $books->id)
                                    @php
                                        $check = 1;
                                    @endphp
                                @endif
                            @endforeach
                            @foreach ($requestbooks as $requestbook)
                                @if ($requestbook->book_id == $books->id)
                                    @php
                                        $requested = 1;
                                    @endphp
                                @endif
                            @endforeach
        
                            @if ($check == 1)
                                <a href="##"
                                    class=" m-1 bg-gray-800 text-white  lg:text-sm px-6 py-3 rounded">Issued</a>
                            @elseif ($requested == 1)
                                <form
                                    action="{{ route('user.cancel.book', ['user_id' => request()->user()->id, 'book_id' => $books->id]) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button
                                        class="m-1 bg-red-600 text-white  lg:text-sm px-6 py-3 rounded">Cancel
                                        Issue</button>
                                </form>
                            @else
                                <form
                                    action="{{ route('transaction.store', ['user_id' => request()->user()->id, 'book_id' => $books->id]) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit"
                                        class=" m-1 bg-gradient-to-r from-orange-600 to-orange-500 text-white lg:text-sm px-6 py-3 rounded">Issue
                                        Book</button>
                                </form>
                            @endif
                    <!--
                        <x-primary-button class="bg-gray-900 mx-4">Buy</x-primary-button>
                    -->
                </div>
            </div>
        </div>
    </section>

    @include('components.other-book')
@endsection
