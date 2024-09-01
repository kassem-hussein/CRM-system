@extends('Layout.Layout')
@section('title')
    {{__('messages.activities')}}
@endsection

@section('content')
{{-- top Actions --}}
<div class="flex items-center justify-between mt-4">
    <div class="text-lg font-medium">{{__('messages.activities')}}</div>
    <div>
        <a href="/activities/add" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.add')}}</a>
        <a href="/activities/print" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.print')}}</a>
    </div>
</div>
{{-- Display Data in table --}}
@if (count($activities))
    <table class="table-auto w-full mt-16">
        <thead>
            <tr>
                <th >ID</th>
                <th >{{__('messages.opportunity')}}</th>
                <th >{{__('messages.description')}}</th>
                <th >{{__('messages.activity_type')}}</th>
                <th >{{__('messages.activity_date')}}</th>
                <th >{{__('messages.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($activities as $activity)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$activity->opportunity->name}}</td>
                    <td>{{$activity->description}}</td>
                    <td>{{$activity->type}}</td>
                    <td>{{$activity->date}}</td>
                    <td>
                        <div class="flex items-baseline  justify-center">
                            <a href="/activities/{{$activity->id}}"><img class="w-[25px] h-[25px]" src="{{asset('icons/edit-3-svgrepo-com.svg')}}" alt="edit"></a>
                            <form action="/activities/{{$activity->id}}">
                                <button type="button" class="delete-btn">
                                    <img class="w-[25px] h-[25px]" src="{{asset('icons/delete-2-svgrepo-com.svg')}}" alt="delete">
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        @if ($activities->lastPage() != 1)
            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="flex justify-end gap-2 p-2">
                            @if ($activities->previousPageUrl())
                                <a href="{{$activities->previousPageUrl()}}" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.prev')}}</a>
                            @endif
                            <div class="bg-slate-900 rounded p-2 w-[60px] text-white text-center">{{$activities->currentPage()}}</div>
                            @if ($activities->nextPageUrl())
                                <a href="{{$activities->nextPageUrl()}}" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.next')}}</a>
                            @endif
                        </div>
                    </td>
                </tr>
            </tfoot>
        @endif
    </table>
@endif
@endsection
