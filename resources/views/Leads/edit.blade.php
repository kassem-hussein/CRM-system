@extends('Layout.Layout')
@section('title')
    {{__('messages.lead_edit')}}
@endsection
@section('content')
    <div class="flex gap-1 items-center p-4">
        <a class="history" href="/leads">{{__('messages.leads')}}</a>
        <div>
            @if(Config::get('app.locale') == 'ar')
                <svg width="24" style="transform: rotate(180deg)" height="24" viewBox="0 0 24 24" fill="#e1e1e1"><path d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path><path fill="none" d="M0,0h24v24H0V0z"></path></svg>
            @else
                <svg width="24"  height="24" viewBox="0 0 24 24" fill="#e1e1e1"><path d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path><path fill="none" d="M0,0h24v24H0V0z"></path></svg>
            @endif
        </div>
        <a class="history">{{__('messages.lead_edit')}}</a>
    </div>
    <form class="p-4" action="/leads/{{$lead->id}}" method="post">
        @csrf
        <div class="flex flex-col my-1">
            <label for="customer" required>{{__('messages.customer')}}</label>
            <select type="text" id="customer" name="customer_id">
                <option value="">{{__('messages.select_customer')}}</option>
                @foreach ($customers as $customer)
                    <option value="{{$customer->id}}" @selected($lead->customer_id == $customer->id)>{{$customer->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('customer_id'))
                 <div class="error">{{$errors->first('customer_id')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="source" required>{{__('messages.lead_source')}}</label>
            <input type="text" id="source" value="{{$lead->lead_source}}" name="lead_source" placeholder="{{__('messages.lead_source')}}"/>
            @if ($errors->has('lead_source'))
                 <div class="error">{{$errors->first('lead_source')}}</div>
            @endif
        </div>
        <div class="flex flex-col my-1">
            <label for="status" required>{{__('messages.lead_status')}}</label>
            <select type="text" id="status"  name="lead_status">
                <option value="">{{__('messages.select_status')}}</option>
                <option value="new" @selected($lead->lead_status == "new")>{{__('messages.new')}}</option>
                <option value="contacted" @selected($lead->lead_status == "contacted")>{{__('messages.contacted')}}</option>
                <option value="qualified" @selected($lead->lead_status == "qualified")>{{__('messages.qualified')}}</option>
            </select>
            @if ($errors->has('lead_status'))
                 <div class="error">{{$errors->first('lead_status')}}</div>
            @endif
        </div>
        <div class="flex justify-end mt-3">
            <button type="submit" class="bg-orange-500 text-white rounded  p-2 px-6 ">{{__('messages.edit')}}</button>
        </div>
    </form>
@endsection
