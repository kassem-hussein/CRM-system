@extends('Layout.Print')
@section('title')
    {{__('messages.contacts')}}
@endsection
@section('content')
<table class="table-auto w-full mt-16 ">
    <thead>
        <tr>
            <th >ID</th>
            <th >{{__('messages.name')}}</th>
            <th >{{__('messages.phone')}}</th>
            <th >{{__('messages.email')}}</th>
            <th >{{__('messages.job_title')}}</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1
        @endphp
        @foreach ($contacts as $contact)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$contact->customer->name}}</td>
                <td>{{$contact->phone}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->job_title}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
