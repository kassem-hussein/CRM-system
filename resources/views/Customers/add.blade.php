@extends('Layout.Layout')
@section('title')
    {{__('messages.add_customer')}}
@endsection
@section('content')
    <div class="flex gap-1 items-center p-4">
        <a class="history" href="/customers">{{__('messages.customers')}}</a>
        <div>
            @if(Config::get('app.locale') == 'ar')
                <svg width="24" style="transform: rotate(180deg)" height="24" viewBox="0 0 24 24" fill="#e1e1e1"><path d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path><path fill="none" d="M0,0h24v24H0V0z"></path></svg>
            @else
                <svg width="24"  height="24" viewBox="0 0 24 24" fill="#e1e1e1"><path d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path><path fill="none" d="M0,0h24v24H0V0z"></path></svg>
            @endif
        </div>
        <a class="history">{{__('messages.add_customer')}}</a>
    </div>
    <form class="p-4" action="/customers" method="post">
        @csrf
        <div class="flex flex-col my-1">
            <label for="name" required>{{__('messages.name')}}</label>
            <input type="text" id="name" value="{{old('name')}}" name="name" placeholder="{{__('messages.name')}}"/>
            @if ($errors->has('name'))
                 <div class="error">{{$errors->first('name')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="phone" required>{{__('messages.phone')}}</label>
            <input type="text" id="phone" value="{{old('phone')}}" name="phone" placeholder="{{__('messages.phone')}}"/>
            @if ($errors->has('phone'))
                 <div class="error">{{$errors->first('phone')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="email" required>{{__('messages.email')}}</label>
            <input type="email" id="email" value="{{old('email')}}" name="email" placeholder="{{__('messages.email')}}"/>
            @if ($errors->has('email'))
                 <div class="error">{{$errors->first('email')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="address" required>{{__('messages.address')}}</label>
            <input type="text" id="address" name="address" value="{{old('address')}}" placeholder="{{__('messages.address')}}">
            @if ($errors->has('address'))
                 <div class="error">{{$errors->first('address')}}</div>
            @endif
        </div>
        <div class="flex justify-end mt-3">
            <button type="submit" class="bg-orange-500 text-white rounded  p-2 px-6 ">{{__('messages.add')}}</button>
        </div>
    </form>
@endsection
