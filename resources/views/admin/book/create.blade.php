@extends('layouts.app')
@section('content')
    <div class="flex justify-between gap-16 px-4 bg-white ">
        <form action="{{ route('admin.book.store') }}" method="POST" enctype="multipart/form-data"
            class="w-full px-6 py-3 mx-auto mt-2 border-2 rounded shadow-sm shadow-black/40">
            @csrf
            <div class="px-6 pb-1 text-2xl font-bold text-center">
                <p class="">Add New Book</p>
            </div>
            <div class="gap-16 lg:flex">
                <div class="w-full">
                    <div class="mt-3">
                        <label for="title" class="text-sm ">Title</label>
                        <input type="text" class="block w-full h-10 my-1 rounded bg-stone-50 " name="title"
                            id="title">
                    </div>
                    <div class="grid gap-2 lg:grid-cols-2">
                        <div class="mt-3 ">
                            <label for="author" class="block text-sm">Author</label>
                            <input type="text" class="w-full h-10 my-1 rounded bg-stone-50" name="author"
                                id="author">
                        </div>
                        <div class="mt-3">
                            <label for="publisher" class="block text-sm">Publisher</label>
                            <input type="text" class="w-full h-10 my-1 rounded bg-stone-50 " name="publisher"
                                id="publisher">
                        </div>
                    </div>
                    <div class="grid gap-2 lg:grid-cols-2">
                        <div class="mt-3 ">
                            <label for="isdn" class="block text-sm">ISDN</label>
                            <input type="text" class="w-full h-10 my-1 rounded bg-stone-50" name="isdn"
                                id="isdn">
                        </div>
                        <div class="mt-3 ">
                            <label for="edition" class="block text-sm">Edition</label>
                            <input type="text" class="w-full h-10 my-1 rounded bg-stone-50" name="edition"
                                id="edition">
                        </div>
                    </div>
                    <div class="mt-3 ">
                        <label for="course_id" class="block text-sm">Course</label>
                        @foreach ($categories as $category)
                            <div class="items-center inline-block ">

                                <input type="checkbox" class="mx-2 my-1 " name="course_id[]" value="{{ $category->id }}"
                                    id="<?php echo 'course_id' . $category->id; ?>" onclick="myFunction()"><span>{{ $category->course }}</span>
                                <!--<label for="semester" class="block text-sm">Semester</label>-->
                                <select class="hidden m-4" name="semester_id[]" id="<?php echo 'category' . $category->id; ?>">
                                    <option selected disabled>Choose a semester</option>
                                    @foreach ($semesters as $semester)
                                        <option value="{{ $semester->id }}">{{ $semester->semester }} Semester</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    </div>


                    <div class="mt-3">
                        <label for="stock" class="block text-sm">Stock</label>
                        <input type="text" class="w-full h-10 my-1 rounded bg-stone-50" name="stock" id="stock">
                    </div>
                </div>

                <div class="mx-auto mt-3 w-52 lg:w-96">
                    <label class="block" x-data="showImage()">
                        <span class="sr-only">Choose File</span>
                        <input type="file" name="image" id="image" @change="showPreview(event)"
                            class="block text-xs text-gray-500 border w-52 lg:w-full lg:text-sm file:mr-4 file:py-2 file:px-4 file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                        <figure class="relative my-1 shadow-sm lg:my-4 shadow-black/40">
                            <figcaption id="caption"
                                class="absolute px-4 py-4 text-4xl tracking-wider text-center bg-gray-300 inset-12 lg:inset-20 lg:p-1 lg:text-8xl text-stone-50">
                                +
                            </figcaption>
                            <img id="preview" class="object-fill h-44 lg:h-72 w-52 lg:w-96 bg-stone-50">
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


            <input type="submit" class="w-full px-3 py-2 mt-3 text-white bg-blue-600 rounded" value="Add Book">

        </form>
        <!--
                                    <div class="w-1/3 p-4 border-l-2 ">
                                        <h1 class="font-medium text-gray-600">Recently Added</h1>
                                        @foreach ($books as $book)
    <div class="inline-flex items-center my-3 ">
                                                <img src="{{ asset('images/book/' . $book->image) }}" class="h-12" alt="">
                                                <div>
                                                    <p class="px-3 text-sm font-medium text-gray-600">{{ $book->title }}</p>
                                                    <a href="{{ route('admin.book.edit', $book->id) }}"
                                                        class="px-2 py-1 ml-3 text-xs text-white bg-green-500 rounded">Manage</a>
                                                </div>
                                            </div>
    @endforeach
                                    </div>-->
    </div>

    <script>
        function myFunction() {
            var checkBox1 = document.getElementById("course_id1");
            var checkBox2 = document.getElementById("course_id2");
            var checkBox3 = document.getElementById("course_id3");
            var option1 = document.getElementById("category1");
            var option2 = document.getElementById("category2");
            var option3 = document.getElementById("category3");
            if (checkBox1.checked == true) {
                option1.style.display = "inline-block";
            } else {
                option1.style.display = "none";
            }
            if (checkBox2.checked == true) {
                option2.style.display = "inline-block";
            } else {
                option2.style.display = "none";
            }

            if (checkBox3.checked == true) {
                option3.style.display = "inline-block";
            } else {
                option3.style.display = "none";
            }

        }
    </script>
@endsection
