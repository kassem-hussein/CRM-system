@extends('Layout.Layout')
@section('title')
    {{__('edit_task')}}
@endsection
@section('content')

<div class="flex gap-1 items-center p-4">
    <a class="history" href="/tasks">{{__('messages.tasks')}}</a>
    <div>
        @if(Config::get('app.locale') == 'ar')
            <svg width="24" style="transform: rotate(180deg)" height="24" viewBox="0 0 24 24" fill="#e1e1e1"><path d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path><path fill="none" d="M0,0h24v24H0V0z"></path></svg>
        @else
            <svg width="24"  height="24" viewBox="0 0 24 24" fill="#e1e1e1"><path d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path><path fill="none" d="M0,0h24v24H0V0z"></path></svg>
        @endif
    </div>
    <a class="history">{{__('messages.edit_task')}}</a>
</div>
<form class="p-4" action="/tasks/{{$task->id}}" method="post">
    @csrf
    <div class="flex flex-col my-1">
        <label for="name" required>{{__('messages.name')}}</label>
        <input type="text" id="name" value="{{$task->name}}" name="name" placeholder="{{__('messages.name')}}"/>
        @if ($errors->has('name'))
             <div class="error">{{$errors->first('name')}}</div>
        @endif
    </div>
    <div class="flex flex-col my-1">
        <label for="description" required>{{__('messages.description')}}</label>
        <input type="text" id="description" value="{{$task->description}}" name="description" placeholder="{{__('messages.description')}}"/>
        @if ($errors->has('description'))
             <div class="error">{{$errors->first('description')}}</div>
        @endif
    </div>
    <div class="flex flex-col my-1">
        <label for="start_date" required>{{__('messages.start_date')}}</label>
        <input type="datetime-local" id="start_date" value="{{$task->start_date}}" name="start_date" placeholder="{{__('messages.start_date')}}"/>
        @if ($errors->has('start_date'))
             <div class="error">{{$errors->first('start_date')}}</div>
        @endif
    </div>
    <div class="flex flex-col my-1">
        <label for="end_date" required>{{__('messages.end_date')}}</label>
        <input type="datetime-local" id="end_date" value="{{$task->end_date}}" name="end_date" placeholder="{{__('messages.end_date')}}"/>
        @if ($errors->has('end_date'))
             <div class="error">{{$errors->first('end_date')}}</div>
        @endif
    </div>
    <div class="flex flex-col my-1">
        <label for="status" required>{{__('messages.status')}}</label>
        <select name="status" id="status">
            <option value="in progress" @selected($task->status == "in progress")>{{__('messages.in_progress')}}</option>
            <option value="done"        @selected($task->status == "done")>{{__('messages.done')}}</option>
            <option value="cancled"     @selected($task->status == "cancled")>{{__('messages.cancled')}}</option>
        </select>
    </div>
    <div class="flex justify-end mt-3">
        <button type="submit" class="bg-orange-500 text-white rounded  p-2 px-6 ">{{__('messages.edit')}}</button>
    </div>
</form>
@endsection
