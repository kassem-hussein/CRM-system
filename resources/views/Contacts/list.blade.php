@extends('Layout.Layout')
@section('title')
    {{__('messages.contacts')}}
@endsection
@section('content')
{{-- top Actions --}}
<div class="flex items-center justify-between mt-4">
    <div class="text-lg font-medium">{{__('messages.contacts')}}</div>
    <div>
        <a href="/contacts/add" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.add')}}</a>
        <a href="/contacts/print" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.print')}}</a>
    </div>
</div>
{{-- Display Data in table --}}
@if (count($contacts))
    <table class="table-auto w-full mt-16">
        <thead>
            <tr>
                <th >ID</th>
                <th >{{__('messages.name')}}</th>
                <th >{{__('messages.phone')}}</th>
                <th >{{__('messages.email')}}</th>
                <th >{{__('messages.job_title')}}</th>
                <th >{{__('messages.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1
            @endphp
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$contact->customer->name}}</td>
                    <td>{{$contact->phone}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->job_title}}</td>
                    <td>
                        <div class="flex items-baseline  justify-center">
                            <a href="/contacts/{{$contact->id}}"><img class="w-[25px] h-[25px]" src="{{asset('icons/edit-3-svgrepo-com.svg')}}" alt="edit"></a>
                            <form action="/contacts/{{$contact->id}}" method="post">
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
        @if ($contacts->lastPage() != 1)
            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="flex justify-end gap-2 p-2">
                            @if ($contacts->previousPageUrl())
                                <a href="{{$contacts->previousPageUrl()}}" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.prev')}}</a>
                            @endif
                            <div class="bg-slate-900 rounded p-2 w-[60px] text-white text-center">{{$contacts->currentPage()}}</div>
                            @if ($contacts->nextPageUrl())
                                <a href="{{$contacts->nextPageUrl()}}" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.next')}}</a>
                            @endif
                        </div>
                    </td>
                </tr>
            </tfoot>
        @endif
    </table>
@endif

@endsection
