@extends('Layout.Print')
@section('title')
    {{__('messages.products')}}
@endsection
@section('content')
<table class="table-auto w-full mt-16 ">
        <thead>
            <tr>
                <th >ID</th>
                <th >{{__('messages.name')}}</th>
                <th >{{__('messages.username')}}</th>
                <th >{{__('messages.role')}}</th>
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
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
