@extends('Layout.Layout')
@section('title')
 {{__('messages.opportunities')}}
@endsection
@section('content')
{{-- top Actions --}}
<div class="flex items-center justify-between my-4">
    <div class="text-lg font-medium">{{__('messages.opportunities')}}</div>
    <div>
        <a href="/opportunities/add" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.add')}}</a>
        <a href="/opportunities/print" class="p-2 bg-slate-900 rounded text-white hover:bg-orange-500 transition-all">{{__('messages.print')}}</a>
    </div>
</div>
{{-- Filter By stage --}}
<form action="" method="get" class="mb-6">
    <label for="stage">{{__('messages.stage')}}</label>
    <select onchange="submit()" name="stage" id="satge" class="round w-full sm:w-2/4">
        <option value="all"       @selected(request()->query('stage') == "all" )>{{__('messages.all')}}</option>
        <option value="new"       @selected(request()->query('stage') == "new" ) >{{__('messages.new')}}</option>
        <option value="open"      @selected(request()->query('stage') == "open" )>{{__('messages.open')}}</option>
        <option value="qualified" @selected(request()->query('stage') == "qualified" )>{{__('messages.qualified')}}</option>
        <option value="won"       @selected(request()->query('stage') == "won" )>{{__('messages.won')}}</option>
        <option value="lost"      @selected(request()->query('stage') == "lost" )>{{__('messages.lost')}}</option>
    </select>
</form>

{{-- Display Data in table --}}
<div>
    @foreach ($opportunities as $opportunity)
        <div style="background-color: #e2e2e295;" class="flex flex-wrap items-center justify-between mt-1 mx-2 border border-gray-300   p-4 rounded">
            <div>
                <div class="flex items-center gap-2"><span class="font-semibold">{{__('messages.customer')}}:</span>{{$opportunity->lead->customer->name}}</div>
                <div class="flex items-center gap-2"><span class="font-semibold">{{__('messages.phone')}}:</span>{{$opportunity->lead->customer->phone}}</div>
                <div class="flex items-center gap-2"><span class="font-semibold">{{__('messages.email')}}:</span>{{$opportunity->lead->customer->email}}</div>
            </div>
            <div>
                <div class="flex items-center gap-2"><span class="font-semibold">{{__('messages.opportunity')}}:</span>{{$opportunity->name}}</div>
                <div class="flex items-center gap-2"><span class="font-semibold">{{__('messages.product')}}:</span>{{$opportunity->product->name}}</div>
                <div class="flex items-center gap-2"><span class="font-semibold">{{__('messages.lead_source')}}:</span>{{$opportunity->lead->lead_source}}</div>
                <div class="flex items-center gap-2"><span class="font-semibold">{{__('messages.expected_revenue')}}:</span>{{$opportunity->excpected_revenue}}</div>
            </div>
            <div>
                <div>
                    <div class="flex items-baseline  justify-center">
                        <a href="/opportunities/{{$opportunity->id}}"><img class="w-[25px] h-[25px]" src="{{asset('icons/edit-3-svgrepo-com.svg')}}" alt="edit"></a>
                        <form action="/opportunities/{{$opportunity->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-btn">
                                <img class="w-[25px] h-[25px]" src="{{asset('icons/delete-2-svgrepo-com.svg')}}" alt="delete">
                            </button>
                        </form>
                    </div>
                </div>
                <div class="flex items-center gap-2"><span class="font-semibold">{{__('messages.stage')}}:</span>{{__('messages.'.$opportunity->stage)}}</div>
            </div>
        </div>
    @endforeach
</div>
{{-- pagination --}}
@if ($opportunities->lastPage() != 1)
    <div class="flex items-center gap-2 mt-5">
        @if($opportunities->previousPageUrl())
            <a href="{{$opportunities->previousPageUrl()}}" class="bg-slate-900 text-white p-2 rounded hover:bg-orange-500">{{__('messages.prev')}}</a>
        @endif
        <div class="bg-slate-900 p-2 px-4 rounded text-white">{{$opportunities->currentPage()}}</div>
        @if ($opportunities->nextPageUrl())
            <a href="{{$opportunities}}" class="bg-slate-900 text-white p-2 rounded hover:bg-orange-500">{{__('messages.next')}}</a>
        @endif
    </div>
@endif
@endsection
