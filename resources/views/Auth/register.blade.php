@extends('Layout.Layout')
@section('title')
    {{__('messages.add_user')}}
@endsection
@section('content')
<div class="flex gap-1 items-center p-4">
    <a class="history" href="/users">{{__('messages.users')}}</a>
    <div>
        @if(Config::get('app.locale') == 'ar')
            <svg width="24" style="transform: rotate(180deg)" height="24" viewBox="0 0 24 24" fill="#e1e1e1"><path d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path><path fill="none" d="M0,0h24v24H0V0z"></path></svg>
        @else
            <svg width="24"  height="24" viewBox="0 0 24 24" fill="#e1e1e1"><path d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path><path fill="none" d="M0,0h24v24H0V0z"></path></svg>
        @endif
    </div>
    <a class="history">{{__('messages.add_user')}}</a>
</div>
<form class="p-4" action="/users" method="post">
    @csrf
    <div class="flex flex-col my-1">
        <label for="name" required>{{__('messages.name')}}</label>
        <input type="text" id="name" value="{{old('name')}}" name="name" placeholder="{{__('messages.name')}}"/>
        @if ($errors->has('name'))
             <div class="error">{{$errors->first('name')}}</div>
        @endif
    </div>
    <div class="flex flex-col my-1">
        <label for="username" required>{{__('messages.username')}}</label>
        <input type="text" id="username" value="{{old('username')}}" name="username" placeholder="{{__('messages.username')}}"/>
        @if ($errors->has('username'))
             <div class="error">{{$errors->first('username')}}</div>
        @endif
    </div>
    <div class="flex flex-col my-1">
        <label for="password" required>{{__('messages.password')}}</label>
        <input type="password" id="password" value="{{old('password')}}" name="password" placeholder="{{__('messages.password')}}"/>
        @if ($errors->has('password'))
             <div class="error">{{$errors->first('password')}}</div>
        @endif
    </div>
    <div class="flex flex-col my-1">
        <label for="password_confirmation" required>{{__('messages.password_confirmation')}}</label>
        <input type="password" id="password_confirmation" value="{{old('password_confirmation')}}" name="password_confirmation" placeholder="{{__('messages.password_confirmation')}}"/>
        @if ($errors->has('password_confirmation'))
             <div class="error">{{$errors->first('password_confirmation')}}</div>
        @endif
    </div>
    <div class="flex flex-col my-1">
        <label for="role" required>{{__('messages.role')}}</label>
        <select name="role" id="role">
            <option value="saler">{{__('messages.saler')}}</option>
            <option value="Admin">{{__('messages.admin')}}</option>
        </select>
        @if ($errors->has('role'))
             <div class="error">{{$errors->first('role')}}</div>
        @endif
    </div>
    <div class="flex justify-end mt-3">
        <button type="submit" class="bg-orange-500 text-white rounded  p-2 px-6 ">{{__('messages.add')}}</button>
    </div>
</form>


@endsection
