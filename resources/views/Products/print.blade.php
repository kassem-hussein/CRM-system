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
            <th >{{__('messages.description')}}</th>
            <th >{{__('messages.price')}}</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($products as $product)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>${{$product->price}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
