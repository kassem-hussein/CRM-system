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
            <th >{{__('messages.product')}}</th>
            <th >{{__('messages.quantity')}}</th>
            <th >{{__('messages.amount')}}</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($sales as $sale)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$sale->opportunity->name}}</td>
                <td>{{$sale->proudct->name}}</td>
                <td>{{$sale->quantity}}</td>
                <td>${{$sale->opportunity->excpected_revenue}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
