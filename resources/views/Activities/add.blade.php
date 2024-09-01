@extends('Layout.Layout')
@section('title')
    {{__('messages.add_activity')}}
@endsection
@section('content')
    <div class="flex gap-1 items-center p-4">
        <a class="history" href="/activities">{{__('messages.activities')}}</a>
        <div>
            @if(Config::get('app.locale') == 'ar')
                <svg width="24" style="transform: rotate(180deg)" height="24" viewBox="0 0 24 24" fill="#e1e1e1"><path d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path><path fill="none" d="M0,0h24v24H0V0z"></path></svg>
            @else
                <svg width="24"  height="24" viewBox="0 0 24 24" fill="#e1e1e1"><path d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path><path fill="none" d="M0,0h24v24H0V0z"></path></svg>
            @endif
        </div>
        <a class="history">{{__('messages.add_activity')}}</a>
    </div>
    <form class="p-4" action="/activities" method="post">
        @csrf
        <div class="flex flex-col my-1">
            <label for="opportunity" required>{{__('messages.opportunity')}}</label>
            <select name="opportunity_id" id="opportunity">
                <option value="">{{__('messages.select_opportunity')}}</option>
                @foreach ($opportunities as $opportunity)
                    <option value="{{$opportunity->id}}">{{$opportunity->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('opportunity_id'))
                 <div class="error">{{$errors->first('opportunity_id')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="description" required>{{__('messages.description')}}</label>
            <input type="text" id="description" value="{{old('description')}}" name="description" placeholder="{{__('messages.description')}}"/>
            @if ($errors->has('description'))
                 <div class="error">{{$errors->first('description')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="type" required>{{__('messages.activity_type')}}</label>
            <input type="text" id="type" value="{{old('type')}}" name="type" placeholder="{{__('messages.activity_type')}}"/>
            @if ($errors->has('type'))
                 <div class="error">{{$errors->first('type')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="date" required>{{__('messages.activity_date')}}</label>
            <input type="date" id="date" value="{{old('date')}}" name="date" placeholder="{{__('messages.activity_date')}}"/>
            @if ($errors->has('date'))
                 <div class="error">{{$errors->first('date')}}</div>
            @endif
        </div>
        <div class="flex justify-end mt-3">
            <button type="submit" class="bg-orange-500 text-white rounded  p-2 px-6 ">{{__('messages.add')}}</button>
        </div>
    </form>
@endsection
