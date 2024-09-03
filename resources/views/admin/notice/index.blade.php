@extends('layouts.app')

@section('content')
<div class="px-3 lg:px-6 bg-white">
    <div class="font-bold text-4xl py-6">
        <h1 class="inline-block">Notices</h1>
        <div class="inline-flex float-right my-4">
            <a href="{{route('admin.notice.create')}}" class="bg-blue-600 text-white px-3 py-2 text-lg rounded">Add data</a>
        </div>
       
    </div>

    
    <table class="display  text-sm lg:text-base" id="mytable">
            <thead>
                <th>S.N</th>
                <th>Title</th>
                <th>Content</th>
                <th class="hidden lg:table-cell">Image</th>
                <th class="hidden lg:table-cell">Date</th>
                <th>Action</th>
            </thead>
            <tbody class="text-sm">
                @foreach ($notices as $data)
                    <tr >
                        <td>{{$data->id}}</td>
                        <td>{{$data->title}}</td>
                        <td class="whitespace-nowrap overflow-hidden text-ellipsis">{{$data->content}}</td>
                      
                        <td >
                            <img src="{{asset('images/notice/'.$data->image)}}" class="h-16 mx-auto" alt="">
                        </td>
                        <td>{{$data->created_at}}</td>
                        <td>
                            <a href="{{ route('admin.notice.edit', $data->id) }}"
                                class="bg-green-500 text-white p-2  rounded inline-flex mx-2">
                                <svg class="feather feather-edit w-4 h-5" fill="none" height="24"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" width="24">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                </svg>
                            </a>
                            <Button id="confirm-delete" class="bg-red-600 text-sm text-white p-2 rounded">
                                <svg class="svg-icon w-4 h-5 fill-current" viewBox="0 0 20 20" fill="none">
                                    <path d="M7.083,8.25H5.917v7h1.167V8.25z M18.75,3h-5.834V1.25c0-0.323-0.262-0.583-0.582-0.583H7.667
                                                c-0.322,0-0.583,0.261-0.583,0.583V3H1.25C0.928,3,0.667,3.261,0.667,3.583c0,0.323,0.261,0.583,0.583,0.583h1.167v14
                                                c0,0.644,0.522,1.166,1.167,1.166h12.833c0.645,0,1.168-0.522,1.168-1.166v-14h1.166c0.322,0,0.584-0.261,0.584-0.583
                                                C19.334,3.261,19.072,3,18.75,3z M8.25,1.833h3.5V3h-3.5V1.833z M16.416,17.584c0,0.322-0.262,0.583-0.582,0.583H4.167
                                                c-0.322,0-0.583-0.261-0.583-0.583V4.167h12.833V17.584z M14.084,8.25h-1.168v7h1.168V8.25z M10.583,7.083H9.417v8.167h1.167V7.083
                                                z"></path>
                                </svg>
                            </Button>
                            @section('deleteroute')
                            <form action="{{ route('notice.delete', $data->id) }}" method="POST" class="inline-block mr-2">
                                @method('DELETE')
                                @csrf
                                <Button id="confirm-delete" class="bg-red-600  text-white  px-14 py-2 my-4 rounded-md shadow-sm shadow-gray-600/40 ">
                                    Delete
                                </Button>
                            </form>
                            @endsection
                            @include('components.confirm-delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@include('components.scripts')
@endsection