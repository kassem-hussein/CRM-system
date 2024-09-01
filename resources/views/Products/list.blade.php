@extends('Layout.Layout')
@section('title')
    {{__('messages.products')}}
@endsection

@section('content')
{{-- top Actions --}}
<div class="flex items-center justify-between mt-4">
    <div class="text-lg font-medium">{{__('messages.products')}}</div>
    <div>
        <a href="/products/add" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.add')}}</a>
        <a href="/products/print" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.print')}}</a>
    </div>
</div>
{{-- Display Data in table --}}
@if (count($products))
    <table class="table-auto w-full mt-16">
        <thead>
            <tr>
                <th >ID</th>
                <th >{{__('messages.name')}}</th>
                <th >{{__('messages.description')}}</th>
                <th >{{__('messages.price')}}</th>
                <th >{{__('messages.actions')}}</th>
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
                    <td>
                        <div class="flex items-baseline  justify-center">
                            <a href="/products/{{$product->id}}"><img class="w-[25px] h-[25px]" src="{{asset('icons/edit-3-svgrepo-com.svg')}}" alt="edit"></a>
                            <form action="/products/{{$product->id}}" method="post">
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
        @if ($products->lastPage() != 1)
            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="flex justify-end gap-2 p-2">
                            @if ($products->previousPageUrl())
                                <a href="{{$products->previosPageUrl()}}" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.prev')}}</a>
                            @endif
                            <div class="bg-slate-900 rounded p-2 w-[60px] text-white text-center">{{$products->currentPage()}}</div>
                            @if ($products->nextPageUrl())
                                <a href="{{$products->nextPageUrl()}}" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.next')}}</a>
                            @endif
                        </div>
                    </td>
                </tr>
            </tfoot>
        @endif
    </table>
@endif
@endsection
