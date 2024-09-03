@extends('layouts.app')

@section('content')

<div class=" p-6 bg-white min-h-screen">
        <div class="pb-6">
            <h1 class="text-2xl font-bold">Book Transactions</h1>
        </div>
        <table class="display" id="mytable">
            <thead>
                <th>Tid</th>
                <th>Book Title</th>
                <th>Image</th>
                <th>Action</th>
               
            </thead>
            <tbody>
                @foreach ($issuedBook as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->book->title}}</td>
                    <td>
                        <img src="{{asset('images/book/'.$transaction->book->image)}}" class="h-16" alt="">
                    </td>
                    <td>
                        <form action="{{route('book.return',['id'=>$transaction->id,'book_id'=>$transaction->book->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="m-1 bg-red-600 text-white text-xs px-2 py-2 rounded">Returned</button>
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