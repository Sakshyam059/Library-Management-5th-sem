<section class="p-4 bg-white mx-4 shadow-lg rounded-md">
    <h1 class="text-2xl text-gray-700 font-extrabold">Recommended Books</h1>
    <div class="grid lg:grid-cols-4 gap-6">
        @foreach ($otherbooks as $book)    
        <div class="bg-white p-2 py-3 lg:p-5 my-4 text-center flex flex-col items-center shadow-sm shadow-black/20 dark:shadow-black/40">
            <img src="{{asset('images/book/'.$book->image)}}" alt="" class="h-56 w-full"> 
            <h2 class=" font-medium  py-2 ">{{$book->title}}</h2>
            <div class="flex">
            @php
                $check=0;
                $requested=0;
            @endphp
                @foreach ($issuedbooks as $issuedbook)
                    @if ($issuedbook->book_id==$book->id)
                        @php
                            $check=1;
                        @endphp
                    @endif
                    
                @endforeach
                @foreach ($requestbooks as $requestbook)
                    @if ($requestbook->book_id==$book->id)
                        @php
                            $requested=1;
                        @endphp
                    @endif
                    
                @endforeach
               
                @if ($check==1)         
                   <a href="##" class="m-1 bg-gray-800 text-white text-xs px-2 py-2 rounded">Issued</a>
                   
                @elseif ($requested==1)
                <form action="{{route('user.cancel.book',['user_id'=>request()->user()->id,'book_id'=>$book->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="m-1 bg-red-600 text-white text-xs px-2 py-2 rounded">Cancel Issue</button>
                </form>
                
               @else
                   <form action="{{route('transaction.store',['user_id'=>request()->user()->id,'book_id'=>$book->id])}}" method="POST">
                        @csrf 
                        <button type="submit" class="m-1 bg-gradient-to-r from-orange-600 to-orange-500 text-white text-xs px-2 py-2 rounded">Issue Book</button>    
                </form>
                @endif
            
                <a href="{{route('user.book.details',$book->id)}}" class="m-1 bg-blue-600 text-white text-xs px-2 py-2 rounded">Details</a>
            </div>
         </div>
        @endforeach
    </div>
</section>