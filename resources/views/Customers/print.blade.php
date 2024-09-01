@extends('Layout.Print')
@section('title')
    {{__('messages.customers')}}
@endsection
@section('content')
<table class="table-auto w-full mt-16 ">
    <thead>
        <tr>
            <th >ID</th>
            <th >{{__('messages.name')}}</th>
            <th >{{__('messages.phone')}}</th>
            <th >{{__('messages.email')}}</th>
            <th >{{__('messages.address')}}</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($customers as $customer)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
            </tr>
        @endforeach
    </tbody>
</table>




@endsection
