@extends('layouts.app')

@section('content')

<div class="p-3 lg:p-6 bg-white min-h-screen">
        <div class="pb-6">
            <h1 class="text-2xl font-bold">Book Requests</h1>
        </div>
        <table class="display" id="mytable">
            <thead class="bg-stone-600 text-white">
                <th>SN</th>
                <th>Title</th>
                <th>Image</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$transaction->book->title}}</td>
                    <td>
                        <img src="{{asset('images/book/'.$transaction->book->image)}}" class="h-16" alt="">
                    </td>
                    <td >
                      
                        <form action="{{route('user.cancel.book',['user_id'=>request()->user()->id,'book_id'=>$transaction->book->id])}}" method="POST" class="inline-flex">
                            @method('DELETE')
                            @csrf
                            <Button type="submit" class="bg-red-600 text-sm text-white p-2 rounded">
                                <svg class="svg-icon w-4 h-5 fill-current" viewBox="0 0 20 20" fill="none">
                                    <path  d="M7.083,8.25H5.917v7h1.167V8.25z M18.75,3h-5.834V1.25c0-0.323-0.262-0.583-0.582-0.583H7.667
                                        c-0.322,0-0.583,0.261-0.583,0.583V3H1.25C0.928,3,0.667,3.261,0.667,3.583c0,0.323,0.261,0.583,0.583,0.583h1.167v14
                                        c0,0.644,0.522,1.166,1.167,1.166h12.833c0.645,0,1.168-0.522,1.168-1.166v-14h1.166c0.322,0,0.584-0.261,0.584-0.583
                                        C19.334,3.261,19.072,3,18.75,3z M8.25,1.833h3.5V3h-3.5V1.833z M16.416,17.584c0,0.322-0.262,0.583-0.582,0.583H4.167
                                        c-0.322,0-0.583-0.261-0.583-0.583V4.167h12.833V17.584z M14.084,8.25h-1.168v7h1.168V8.25z M10.583,7.083H9.417v8.167h1.167V7.083
                                        z"></path>
                                </svg>
                            </Button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function(){
            $('#mytable').DataTable();
        });
    </script>

<script>
    function showDelete(id){
        $('#deletebox').removeClass('hidden');
        $('#dataid').val(id);
    }

    function hideDelete(){
        $('#deletebox').addClass('hidden');
    }
</script>
@endsection