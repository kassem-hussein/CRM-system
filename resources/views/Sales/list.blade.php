@extends('Layout.Layout')
@section('title')
    {{__('messages.sales')}}
@endsection

@section('content')
{{-- top Actions --}}
<div class="flex items-center justify-between mt-4">
    <div class="text-lg font-medium">{{__('messages.sales')}}</div>
    <div>
        <a href="/sales/print" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.print')}}</a>
    </div>
</div>
{{-- Display Data in table --}}
<table class="table-auto w-full mt-16">
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
    @if ($sales->lastPage() != 1)
        <tfoot>
            <tr>
                <td colspan="6">
                    <div class="flex justify-end gap-2 p-2">
                        @if ($sales->previousPageUrl())
                            <a href="{{$sales->previousPageUrl()}}" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.prev')}}</a>
                        @endif
                        <div class="bg-slate-900 rounded p-2 w-[60px] text-white text-center">{{$sales->currentPage()}}</div>
                        @if ($sales->nextPageUrl())
                            <a href="{{$sales->nextPageUrl()}}" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.next')}}</a>
                        @endif
                    </div>
                </td>
            </tr>
        </tfoot>
    @endif
</table>

@endsection
