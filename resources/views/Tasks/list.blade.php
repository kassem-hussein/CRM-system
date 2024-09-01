@extends('Layout.Layout')
@section('title')
    {{__('messages.tasks')}}
@endsection
@section('content')
{{-- top Actions --}}
<div class="flex items-center justify-between mt-4">
    <div class="text-lg font-medium">{{__('messages.tasks')}}</div>
    <div>
        <a href="/tasks/add" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.add')}}</a>
        <a href="/tasks/print" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.print')}}</a>
    </div>
</div>
{{-- Display Data in table --}}
@if (count($tasks))
    <table class="table-auto w-full mt-16">
        <thead>
            <tr>
                <th >ID</th>
                <th >{{__('messages.name')}}</th>
                <th >{{__('messages.description')}}</th>
                <th >{{__('messages.start_date')}}</th>
                <th >{{__('messages.end_date')}}</th>
                <th >{{__('messages.status')}}</th>
                <th >{{__('messages.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($tasks as $task)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->description}}</td>
                    <td>{{$task->getStartDate()}}</td>
                    <td>{{$task->getEndDate()}}</td>
                    <td>{{__("messages.".$task->status)}}</td>
                    <td>
                        <div class="flex items-baseline  justify-center">
                            <a href="/tasks/{{$task->id}}"><img class="w-[25px] h-[25px]" src="{{asset('icons/edit-3-svgrepo-com.svg')}}" alt="edit"></a>
                            <form action="/tasks/{{$task->id}}" method="post">
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
        @if ($tasks->lastPage() != 1)
            <tfoot>
                <tr>
                    <td colspan="7">
                        <div class="flex justify-end gap-2 p-2">
                            @if ($tasks->previousPageUrl())
                                <a href="{{$tasks->previousPageUrl()}}" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.prev')}}</a>
                            @endif
                            <div class="bg-slate-900 rounded p-2 w-[60px] text-white text-center">{{$tasks->currentPage()}}</div>
                            @if ($tasks->nextPageUrl())
                                <a href="{{$tasks->nextPageUrl()}}" class="bg-slate-900 text-white rounded p-2 hover:bg-orange-500">{{__('messages.next')}}</a>
                            @endif
                        </div>
                    </td>
                </tr>
            </tfoot>
        @endif
    </table>
@endif
@endsection
