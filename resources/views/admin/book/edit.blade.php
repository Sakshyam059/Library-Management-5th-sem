@extends('layouts.app')

@section('content')
    <div class="px-4 bg-white flex gap-16 justify-between ">
        <form action="{{ route('admin.book.update', ['id' => $update_book->id, 'isdn' => $update_book->isdn]) }}"
            method="POST" enctype="multipart/form-data" class="w-full  mx-auto border-2 py-3 px-6 mt-4">
            @csrf
            <div class="px-6 pb-1 text-2xl font-bold text-center">
                <p class="">Update Book</p>
            </div>

            <div class="lg:flex  gap-16">
                



                <div class="w-full">

                    <div class="mt-3">
                        <label for="title" class="text-sm ">Title</label>
                        <input type="text" class="h-10 bg-stone-50 rounded block w-full  my-1 " name="title"
                            id="title" value="{{ $update_book->title }}">
                    </div>
                    <div class="grid lg:grid-cols-2 gap-2">
                        <div class="mt-3 ">
                            <label for="author" class="text-sm block">Author</label>
                            <input type="text" class="h-10 bg-stone-50 rounded w-full my-1" name="author" id="author"
                                value="{{ $update_book->author }}">
                        </div>
                        <div class="mt-3">
                            <label for="publisher" class="text-sm block">Publisher</label>
                            <input type="text" class="h-10 bg-stone-50 rounded  w-full my-1 " name="publisher"
                                id="publisher" value="{{ $update_book->publisher }}">
                        </div>
                    </div>
                    <div class="grid lg:grid-cols-2 gap-2">
                        <div class="mt-3 ">
                            <label for="isdn" class="text-sm block">ISDN</label>
                            <input type="text" class="h-10 bg-stone-50 rounded   my-1 w-full" name="isdn"
                                id="isdn" value="{{ $update_book->isdn }}">
                        </div>
                        <div class="mt-3 ">
                            <label for="edition" class="text-sm block">Edition</label>
                            <input type="text" class="h-10 bg-stone-50 rounded   my-1 w-full" name="edition"
                                id="edition" value="{{ $update_book->edition }}">
                        </div>
                    </div>
                    <div class="mt-3  ">
                        <label for="course_id" class=" text-sm block">Course</label>
                        @foreach ($courses as $data)
                            <div class=" items-center inline-flex ">
                                @php
                                    $present = 0;
                                @endphp
                                @foreach ($categories as $category)
                                    @if ($category->book_isdn == $update_book->isdn && $category->course_id == $data->id)
                                        @php
                                            $present = 1;
                                        @endphp
                                    @endif
                                @endforeach
                                
                                    @if ($present==1)
                                    <input type="checkbox" class=" mx-2 my-1 " name="course_id[]" 
                                    value="{{ $data->id }}" onclick="myFunction()" checked>
                           @else
                           <input type="checkbox" class=" mx-2 my-1 " name="course_id[]"
                                        value="{{ $data->id }}" onclick="myFunction()">
                               
                                    @endif
                                <span>{{ $data->course }}</span>
                                <!--<label for="semester" class="text-sm block">Semester</label>-->
                                <select class="text-xs m-4 ml-6 w-11/12" name="semester_id[]" id="<?php echo 'category' . $data->id; ?>">
                                    @foreach ($semesters as $semester)
                                        @php
                                            $cat_book = 0;
                                        @endphp
                                        @foreach ($categories as $category)
                                            @if (
                                                $category->book_isdn == $update_book->isdn &&
                                                    $category->course_id == $data->id &&
                                                    $category->semester_id == $semester->id)
                                                @php
                                                    $cat_book = 1;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @if ($cat_book == 1)
                                            <option selected value="{{ $semester->id }}">
                                                {{ $semester->semester }} Semester
                                        @endif
                                        </option>
                                        <option value="{{ $semester->id }}">{{ $semester->semester }} Semester</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    </div>


                    <div class="mt-3">
                        <label for="stock" class="text-sm block">Stock</label>
                        <input type="text" class="h-10 bg-stone-50 rounded   my-1 w-full" name="stock" id="stock"
                            value="{{ $update_book->stock }}">
                    </div>
                </div>

                <div class="mt-3 w-52 lg:w-96 mx-auto">
                    <label class="block" x-data="showImage()">
                        <span class="sr-only">Choose File</span>
                        <input type="file" name="image" id="image" @change="showPreview(event)"
                            class="block w-full text-xs lg:text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 border file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                        <figure class="  lg:my-4 shadow-sm shadow-black/40">
                            
                            <img src="{{ asset('images/book/' . $update_book->image) }}" id="preview"
                                class=" object-fill h-44 lg:h-72 w-52 lg:w-96  bg-stone-50">
                        </figure>

                    </label>
                    @error('image')
                        <div class="flex items-center text-sm text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                @push('scripts')
                    <script>
                        function showImage() {
                            return {
                                showPreview(event) {
                                    if (event.target.files.length > 0) {
                                        var src = URL.createObjectURL(event.target.files[0]);
                                        var preview = document.getElementById("preview"); 
                                        var caption = document.getElementById("caption"); 
                                        preview.src = src;
                                        preview.style.display = "block";
                                        caption.style.display = "none";
                                    }
                                }
                            }
                        }
                    </script>
                @endpush
            </div>


            <input type="submit" class="w-full mt-3 bg-blue-600 text-white px-3 py-2 rounded" value="Update Book">

        </form>

        <!-- <div class="w-1/3 border-l-2 p-4 ">
                    <h1 class="font-medium text-gray-600">Recently Added</h1>
                    @foreach ($all_books as $book)
    <div class=" my-3 inline-flex items-center">
                            <img src="{{ asset('images/book/' . $book->image) }}" class="h-12" alt="">
                            <div>
                                <p class="px-3 text-sm font-medium text-gray-600">{{ $book->title }}</p>
                                <a href="{{ route('admin.book.edit', $book->id) }}" class="ml-3 bg-green-500 text-white px-2 py-1 rounded text-xs" >Manage</a>
                            </div>
                        </div>
    @endforeach
                </div>-->
    </div>
    
@endsection
