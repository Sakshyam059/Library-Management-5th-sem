@extends('layouts.app')

@section('content')
    <section class="bg-white p-4">
        <table class="display" id="mytable">
            <thead>
                <th>S.Id</th>
                <th>Book</th>
                <th>Issue Date</th>
                <th>Action</th>
            </thead>
            <tbody>
               @foreach ($transactions as $transaction)
                   <tr>
                    <td>{{$transaction->user->id}}</td>
                    <td>{{$transaction->book->title}}</td>
                    <td>{{$transaction->created_at}}</td>
                    <td>
                        <a href="" class="bg-red-600 rounded-sm text-white px-3 py-2">Delete</a>
                    </td>
                   </tr>
               @endforeach
            </tbody>
        </table>

    </section>
    <script>
        $(document).ready(function(){
            $('#mytable').DataTable();
        });
    </script>
@endsection