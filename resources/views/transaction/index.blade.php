@extends('layouts.app')
@section('title')
    My Books
@endsection
@section('content')

<div class="p-3 lg:p-6 bg-white min-h-screen">
        <div class="pb-6">
            <h1 class="text-2xl text-center lg:text-left font-bold">Book Transactions</h1>
        </div>
        <table class="display " id="mytable">
            <thead class="bg-stone-600 text-white">
                <th>SN</th>
                <th>Book Title</th>
                <th>Image</th>
               
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$transaction->book->title}}</td>
                    <td>
                        <img src="{{asset('images/book/'.$transaction->book->image)}}" class="h-16" alt="">
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