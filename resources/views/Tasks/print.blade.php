@extends('Layout.Print')
@section('title')
    {{__('messages.sales')}}
@endsection
@section('content')
<table class="table-auto w-full mt-16 ">
    <thead>
        <tr>
            <th >ID</th>
            <th >{{__('messages.name')}}</th>
            <th >{{__('messages.description')}}</th>
            <th >{{__('messages.start_date')}}</th>
            <th >{{__('messages.end_date')}}</th>
            <th >{{__('messages.status')}}</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($tasks as $task)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$task->name}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->getStartDate()}}</td>
                <td>{{$task->getEndDate()}}</td>
                <td>{{__("messages.".$task->status)}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
