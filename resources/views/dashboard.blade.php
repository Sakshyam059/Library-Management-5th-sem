@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="py-2">
        <div class="p-3 py-0 lg:p-4 lg:py-2 overflow-hidden ">
            <div class=" text-gray-900 pb-6">
                <div class="hidden summary lg:grid lg:grid-cols-3 gap-3 lg:gap-10 lg:my-4">
                    <div class="bg-white lg:h-24  rounded-lg shadow-sm shadow-black/20 dark:shadow-black/40">
                        <h2 class="p-3 lg:p-4 lg:px-10 text-stone-600  lg:text-2xl font-semibold">Hey!
                            <span class="lg:block text-blue-600 lg:pt-1">{{ ucfirst(Request::user()->name) }}</span>
                        </h2>
                    </div>
                    <div class="bg-white h-16 lg:h-24  rounded-lg shadow-sm shadow-black/20 dark:shadow-black/40">
                        <h2 class="p-3 lg:p-8 lg:text-2xl font-semibold">Total Books
                            <span class=" lg:float-right">{{ $books->count() }}</span>
                        </h2>
                    </div>
                    <div class="bg-white h-16 lg:h-24 rounded-lg shadow-sm shadow-black/20 dark:shadow-black/40">
                        <h2 class="p-3 lg:p-8 lg:text-2xl font-semibold">My Books
                            <span class="block lg:inline lg:float-right">{{ $issuedbooks->count() }}</span>
                        </h2>
                    </div>
                </div>

                <div class="relative flex flex-col lg:flex-row">
                    <div class="lg:w-2/3 bg-white p-4 shadow-sm shadow-black/40 rounded-md">
                        <h1 class="text-center text-lg text-gray-700 font-extrabold">Latest Books</h1>


                        <table class="text-xs w-full text-center mt-2 lg:text-sm  text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 bg-stone-100 uppercase  dark:text-stone-600">
                                <tr>
                                    <th scope="col" class="lg:px-6 py-3">
                                       SN
                                    </th>
                                    <th scope="col" class="lg:px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="lg:px-6 py-3">
                                        Author
                                    </th>
                                    <th scope="col" class="lg:px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($books as $latestbook)
                            <tbody>
                                <tr class="bg-white border-b  text-stone-600 ">
                                    <th scope="row" class="lg:px-6 py-4 font-medium whitespace-nowrap ">
                                        {{$loop->iteration}}
                                    </th>
                                    <td class="lg:px-6 py-4">
                                        {{$latestbook->title}}
                                    </td>
                                    <td class="lg:px-6 py-4">
                                        {{$latestbook->author}}

                                    </td>
                                    <td class="lg:px-6 py-4">
                                        <a href="{{route('user.book.details',$latestbook->id)}}" class="px-2 lg:px-3 py-1 bg-blue-600 text-stone-50 rounded">View</a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>


                    <div class="bg-white my-3 lg:my-0  lg:w-72 lg:absolute right-0 p-4 shadow-sm shadow-black/40 rounded-md">
                        <h1 class="text-center text-lg text-gray-700 font-extrabold">Notices</h1>

        <div class="">
            @foreach ($notices as $notice)
            <a href="{{route('notice.details',$notice->id)}}" class="">
            <div class="mb-6 lg:mb-0 my-2 border border-gray-200  rounded-md bg-stone-100 hover:bg-stone-200">
                    <div class="p-2 ">
                        <b class="text-[14px]">{{$notice->title}}</b>
                       
                        <a href="{{route('notice.details',$notice->id)}}" class="block text-blue-600  text-[8px]">  Published on <u>{{$notice->created_at}}</u></a>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="flex justify-center mt-2">

            <a href="" class="bg-blue-600 text-white px-4 py-1 text-xs rounded">View all</a>
        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
