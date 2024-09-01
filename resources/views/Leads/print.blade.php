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
            <th >{{__('messages.lead_source')}}</th>
            <th >{{__('messages.lead_status')}}</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1
        @endphp
        @foreach ($leads as $lead)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$lead->customer->name}}</td>
                <td>{{$lead->lead_source}}</td>
                <td>{{__('messages.'.$lead->lead_status)}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
