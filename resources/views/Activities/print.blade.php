z
@extends('Layout.Print')
@section('title')
    {{__('messages.sales')}}
@endsection
@section('content')
<table class="table-auto w-full mt-16 ">
    <thead>
        <tr>
            <th >ID</th>
            <th >{{__('messages.opportunity')}}</th>
            <th >{{__('messages.description')}}</th>
            <th >{{__('messages.activity_type')}}</th>
            <th >{{__('messages.activity_date')}}</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($activities as $activity)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$activity->opportunity->name}}</td>
                <td>{{$activity->description}}</td>
                <td>{{$activity->type}}</td>
                <td>{{$activity->date}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
