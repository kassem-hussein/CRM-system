@extends('Layout.Layout')
@section('title')
    {{__('messages.users')}}
@endsection
@section('content')
{{-- top Actions --}}
<div class="flex items-center justify-between mt-4">
    <div class="text-lg font-medium">{{__('messages.users')}}</div>
    <div>
        <a href="/users/add" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.add')}}</a>
        <a href="/users/print" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.print')}}</a>
    </div>
</div>
{{-- Display Data in table --}}
@if (count($users))
    <table class="table-auto w-full mt-16">
        <thead>
            <tr>
                <th >ID</th>
                <th >{{__('messages.name')}}</th>
                <th >{{__('messages.username')}}</th>
                <th >{{__('messages.role')}}</th>
                <th >{{__('messages.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($users as $user)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <div class="flex items-baseline  justify-center">
                            <a href="/users/{{$user->id}}"><img class="w-[25px] h-[25px]" src="{{asset('icons/edit-3-svgrepo-com.svg')}}" alt="edit"></a>
                            <form action="/users/{{$user->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="delete-btn">
                                    <img class="w-[25px] h-[25px]" src="{{asset('icons/delete-2-svgrepo-com.svg')}}" alt="delete">
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        @if ($users->lastPage() != 1)
            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="flex justify-end gap-2 p-2">
                            @if ($users->previousPageUrl())
                                <a href="{{$users->previosPageUrl()}}" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.prev')}}</a>
                            @endif
                            <div class="bg-slate-900 rounded p-2 w-[60px] text-white text-center">{{$users->currentPage()}}</div>
                            @if ($users->nextPageUrl())
                                <a href="{{$users->nextPageUrl()}}" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.next')}}</a>
                            @endif
                        </div>
                    </td>
                </tr>
            </tfoot>
        @endif
    </table>
@endif
@endsection
