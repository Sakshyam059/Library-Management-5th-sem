@extends('layouts.app')

@section('content')

<div class=" p-6 bg-white min-h-screen">
        <div class="pb-6">
            <h1 class="text-2xl font-bold">Book Transactions</h1>
        </div>
        <table class="display" id="mytable">
            <thead>
                <th>Tid</th>
                <th>User_id</th>
                <th>Book_id</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->user_id}}</td>
                    <td>{{$transaction->book_id}}</td>
                    <td >
                        <form action="{{route('book.issue',['tid'=>$transaction->id,'user_id'=>$transaction->user_id,'book_id'=>$transaction->book_id])}}" method="POST" class="inline-flex">
                            @csrf
                            <button type="submit" class=" bg-green-500 text-white px-3 py-2">Approve</button>
                        </form>
                        <form action="{{route('transaction.delete',$transaction->id)}}" method="POST" class="inline-flex">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class=" bg-red-600 text-white px-3 py-2">Reject</button>
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