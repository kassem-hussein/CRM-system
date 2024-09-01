@extends('Layout.Layout')
@section('title')
    {{__('messages.leads')}}
@endsection
@section('content')
{{-- top Actions --}}
<div class="flex items-center justify-between mt-4">
    <div class="text-lg font-medium">{{__('messages.leads')}}</div>
    <div>
        <a href="/leads/add" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.add')}}</a>
        <a href="/leads/print" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.print')}}</a>
    </div>
</div>
{{-- Display Data in table --}}
@if (count($leads))
    <table class="table-auto w-full mt-16">
        <thead>
            <tr>
                <th >ID</th>
                <th >{{__('messages.name')}}</th>
                <th >{{__('messages.lead_source')}}</th>
                <th >{{__('messages.lead_status')}}</th>
                <th >{{__('messages.actions')}}</th>
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
                    <td>
                        <div class="flex items-baseline  justify-center">
                            <a href="/leads/{{$lead->id}}"><img class="w-[25px] h-[25px]" src="{{asset('icons/edit-3-svgrepo-com.svg')}}" alt="edit"></a>
                            <form action="/leads/{{$lead->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="delete-btn">
                                    <img class="w-[25px] h-[25px]" src="{{asset('icons/delete-2-svgrepo-com.svg')}}" alt="delete">
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        @if ($leads->lastPage() != 1)
            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="flex justify-end gap-2 p-2">
                            @if ($leads->previousPageUrl())
                                <a href="next" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.prev')}}</a>
                            @endif
                            <div class="bg-slate-900 rounded p-2 w-[60px] text-white text-center">{{$leads->currentPage()}}</div>
                            @if ($leads->nextPageUrl())
                                <a href="next" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.next')}}</a>
                            @endif
                        </div>
                    </td>
                </tr>
            </tfoot>
        @endif
    </table>
@endif

@endsection
