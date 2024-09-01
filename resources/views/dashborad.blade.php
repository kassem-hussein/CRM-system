@extends('Layout.Layout')
@section('title')
    dashborad
@endsection
@section('content')
<div class="flex gap-[10px] items-center mt-10 justify-center flex-wrap">
    <div class="bg-orange-600 w-[300px] min-h-[100px] text-white p-2 rounded flex flex-col items-center justify-center">
        <div>
            {{__('messages.customers')}}
        </div>
        <div class="font-bold">{{$customers}}</div>
    </div>
    <div class="bg-orange-600 w-[300px] min-h-[100px] text-white p-2 rounded flex flex-col items-center justify-center">
        <div>
            {{__('messages.products')}}
        </div>
        <div class="font-bold">{{$products}}</div>
    </div>
    <div class="bg-orange-600 w-[300px] min-h-[100px] text-white p-2 rounded flex flex-col items-center justify-center">
        <div>
            {{__('messages.sales')}}
        </div>
        <div class="font-bold">${{$sales}}</div>
    </div>
    <div class="bg-orange-600 w-[300px] min-h-[100px] text-white p-2 rounded flex flex-col items-center justify-center">
        <div>
            {{__('messages.opportunities')}}
        </div>
        <div class="font-bold">${{$opportunities}}</div>
    </div>
    <div class="bg-orange-600 w-[300px] min-h-[100px] text-white p-2 rounded flex flex-col items-center justify-center">
        <div>
            {{__('messages.contacts')}}
        </div>
        <div class="font-bold">{{$contacts}}</div>
    </div>
    <div class="bg-orange-600 w-[300px] min-h-[100px] text-white p-2 rounded flex flex-col items-center justify-center">
        <div>
            {{__('messages.leads')}}
        </div>
        <div class="font-bold">{{$leads}}</div>
    </div>
    <div class="bg-orange-600 w-[300px] min-h-[100px] text-white p-2 rounded flex flex-col items-center justify-center">
        <div>
            {{__('messages.most_lead_source')}}
        </div>
        <div class="font-bold">{{$lead_max}}</div>
    </div>
    <div class="bg-orange-600 w-[300px] min-h-[100px] text-white p-2 rounded flex flex-col items-center justify-center">
        <div>
            {{__('messages.activities')}}
        </div>
        <div class="font-bold">{{$activities}}</div>
    </div>
    <div class="bg-orange-600 w-[300px] min-h-[100px] text-white p-2 rounded flex flex-col items-center justify-center">
        <div>
            {{__('messages.tasks')}}
        </div>
        <div class="font-bold">{{$tasks}}</div>
    </div>
</div>

@endsection
