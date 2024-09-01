@extends('Layout.Layout')
@section('title')
    {{__('messages.add_opportunity')}}
@endsection
@section('content')
    <div class="flex gap-1 items-center p-4">
        <a class="history" href="/opportunities">{{__('messages.opportunities')}}</a>
        <div>
            @if(Config::get('app.locale') == 'ar')
                <svg width="24" style="transform: rotate(180deg)" height="24" viewBox="0 0 24 24" fill="#e1e1e1"><path d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path><path fill="none" d="M0,0h24v24H0V0z"></path></svg>
            @else
                <svg width="24"  height="24" viewBox="0 0 24 24" fill="#e1e1e1"><path d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path><path fill="none" d="M0,0h24v24H0V0z"></path></svg>
            @endif
        </div>
        <a class="history">{{__('messages.add_opportunity')}}</a>
    </div>
    <form class="px-4" action="" method="get">

    </form>
    <form class="p-4" action="/opportunities" method="post">
        @csrf
        <div class="flex flex-col my-1">
            <label for="lead" required>{{__('messages.lead')}}</label>
            <select type="text" id="lead" value="{{old('name')}}" name="lead_id">
                <option value="">{{__('messages.select_lead')}}</option>
                @foreach ($leads as $lead)
                    <option value="{{$lead->id}}">{{$lead->customer->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('lead_id'))
                 <div class="error">{{$errors->first('lead_id')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="product" required>{{__('messages.product')}}</label>
            <select type="text" id="product" name="product_id">
                <option value="">{{__('messages.select_product')}}</option>
                @foreach ($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('product_id'))
                 <div class="error">{{$errors->first('product_id')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="name" required>{{__('messages.opportunity')}}</label>
            <input type="text" id="name" value="{{old('name')}}" name="name" placeholder="{{__('messages.opportunity')}}"/>
            @if ($errors->has('name'))
                 <div class="error">{{$errors->first('name')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="close_date" required>{{__('messages.close_date')}}</label>
            <input type="date" id="close_date" value="{{old('close_date')}}" name="close_date" placeholder="{{__('messages.close_date')}}"/>
            @if ($errors->has('close_date'))
                 <div class="error">{{$errors->first('close_date')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="quantity" required>{{__('messages.quantity')}}</label>
            <input type="number" id="quantity" value="{{old('quantity')}}" name="quantity" placeholder="{{__('messages.quantity')}}"/>
            @if ($errors->has('quantity'))
                 <div class="error">{{$errors->first('quantity')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="stage" required>{{__('messages.stage')}}</label>
            <select name="stage"  id="satge">
                <option value="new">{{__('messages.new')}}</option>
                <option value="open">{{__('messages.open')}}</option>
                <option value="qualified">{{__('messages.qualified')}}</option>
                <option value="won">{{__('messages.won')}}</option>
                <option value="lost">{{__('messages.lost')}}</option>
            </select>
            @if ($errors->has('stage'))
                 <div class="error">{{$errors->first('stage')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="excpected_revenue" required>{{__('messages.expected_revenue')}}</label>
            <input type="text" id="excpected_revenue" name="excpected_revenue" value="{{old('excpected_revenue')}}" placeholder="{{__('messages.expected_revenue')}}">
            @if ($errors->has('excpected_revenue'))
                 <div class="error">{{$errors->first('excpected_revenue')}}</div>
            @endif
        </div>
        <div class="flex justify-end mt-3">
            <button type="submit" class="bg-orange-500 text-white rounded  p-2 px-6 ">{{__('messages.add')}}</button>
        </div>
    </form>
@endsection
