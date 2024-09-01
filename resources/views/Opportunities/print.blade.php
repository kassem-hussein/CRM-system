@extends('Layout.Print')
@section('title')
    {{__('messages.opportunities')}}
@endsection
@section('content')
<table class="table-auto w-full mt-16 ">
    <thead>
        <tr>
            <th >ID</th>
            <th >{{__('messages.customer')}}</th>
            <th >{{__('messages.phone')}}</th>
            <th >{{__('messages.opportunity')}}</th>
            <th >{{__('messages.expected_revenue')}}</th>
            <th >{{__('messages.stage')}}</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($opportunities as $opportunity)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$opportunity->lead->customer->name}}</td>
                <td>{{$opportunity->lead->customer->phone}}</td>
                <td>{{$opportunity->name}}</td>
                <td>${{$opportunity->excpected_revenue}}</td>
                <td>{{__('messages.'.$opportunity->stage)}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
