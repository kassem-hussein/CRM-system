@extends('Layout.Layout')
@section('title')
    Customers
@endsection

@section('content')
{{-- top Actions --}}
<div class="flex items-center justify-between mt-4">
    <div class="text-lg font-medium">{{__('messages.customers')}}</div>
    <div>
        <a href="/customers/add" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.add')}}</a>
        <a href="/customers/print" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.print')}}</a>
    </div>
</div>
{{-- Display Data in table --}}
@if(count($customers))
<table class="table-auto w-full mt-16">
    <thead>
        <tr>
            <th >ID</th>
            <th >{{__('messages.name')}}</th>
            <th >{{__('messages.phone')}}</th>
            <th >{{__('messages.email')}}</th>
            <th >{{__('messages.address')}}</th>
            <th >{{__('messages.actions')}}</th>
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
                <td>
                    <div class="flex items-baseline  justify-center">
                        <a href="/customers/{{$customer->id}}"><img class="w-[25px] h-[25px]" src="{{asset('icons/edit-3-svgrepo-com.svg')}}" alt="edit"></a>
                        <form action="/customers/{{$customer->id}}" method="POST">
                            @method('delete')
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
    @if ($customers->lastPage() != 1)
        <tfoot>
            <tr>
                <td colspan="6">
                    <div class="flex justify-end gap-2 p-2">
                        @if($customers->previousPageUrl())
                            <a href="{{$customers->previousPageUrl()}}" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.prev')}}</a>
                        @endif
                        <div class="bg-slate-900 rounded p-2 w-[60px] text-white text-center">{{$customers->currentPage()}}</div>
                        @if ($customers->nextPageUrl())
                            <a href="{{$customers->nextPageUrl()}}" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.next')}}</a>
                        @endif
                    </div>
                </td>
            </tr>
        </tfoot>
    @endif
</table>
@endif
@endsection
