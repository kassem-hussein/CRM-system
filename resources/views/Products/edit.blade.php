@extends('Layout.Layout')
@section('title')
    {{__('messages.edit_product')}}
@endsection
@section('content')
    <div class="flex gap-1 items-center p-4">
        <a class="history" href="/products">{{__('messages.products')}}</a>
        <div>
            @if(Config::get('app.locale') == 'ar')
                <svg width="24" style="transform: rotate(180deg)" height="24" viewBox="0 0 24 24" fill="#e1e1e1"><path d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path><path fill="none" d="M0,0h24v24H0V0z"></path></svg>
            @else
                <svg width="24"  height="24" viewBox="0 0 24 24" fill="#e1e1e1"><path d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path><path fill="none" d="M0,0h24v24H0V0z"></path></svg>
            @endif
        </div>
        <a class="history">{{__('messages.edit_product')}}</a>
    </div>
    <form class="p-4" action="/products/{{$product->id}}" method="post">
        @csrf
        <div class="flex flex-col my-1">
            <label for="name" required>{{__('messages.name')}}</label>
            <input type="text" id="name" value="{{$product->name}}" name="name" placeholder="{{__('messages.name')}}"/>
            @if ($errors->has('name'))
                 <div class="error">{{$errors->first('name')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="description" required>{{__('messages.description')}}</label>
            <input type="text" id="description" value="{{$product->description}}" name="description" placeholder="{{__('messages.description')}}"/>
            @if ($errors->has('description'))
                 <div class="error">{{$errors->first('description')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="price" required>{{__('messages.price')}}</label>
            <input type="price" id="price" value="{{$product->price}}" name="price" placeholder="{{__('messages.price')}}"/>
            @if ($errors->has('price'))
                 <div class="error">{{$errors->first('price')}}</div>
            @endif
        </div>
        <div class="flex justify-end mt-3">
            <button type="submit" class="bg-orange-500 text-white rounded  p-2 px-6 ">{{__('messages.edit')}}</button>
        </div>
    </form>
@endsection
