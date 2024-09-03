@extends('layouts.app')

@section('content')

<div class="p-3 lg:p-6 bg-white min-h-screen">
        <div class="pb-6">
            <h1 class="text-2xl font-bold">All Users</h1>
        </div>
        <table class="display text-center text-sm lg:text-base lg:text-left" id="mytable" >
            <thead class="bg-stone-700 text-stone-50">
                <th>Id</th>
                <th>Name</th>
                <th>Role</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->usertype}}</td>
                    <td>
                        <a href="{{route('admin.user_edit',$user->id)}}" class="block my-1 lg:my-0 lg:inline  text-xs bg-green-500 text-white px-3 py-2 rounded">Manage</a>
                        <a href="{{route('user.transactionDetails.index',$user->id)}}" class="block my-1 lg:my-0 lg:inline  text-xs  bg-blue-500 text-white px-3 py-2 rounded">Transactions</a>
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
@endsection