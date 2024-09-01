<header class="bg-slate-900 text-white py-2 flex justify-between items-center px-10">
    <div class="flex items-center gap-3">
        <div id="collapse-menu" class="cursor-pointer">
            <div class="w-5 h-[2px] mb-1 bg-white"></div>
            <div class="w-2 h-[2px] mb-1 bg-white"></div>
            <div class="w-1 h-[2px] mb-1 bg-white"></div>
        </div>
        <div class="user-name">{{__('messages.hi')}},{{Auth::user()->name}}</div>
    </div>
    <div class="flex items-center gap-5">
        <div  class="relative group" >
            <img src="{{asset('icons/lang-svgrepo-com.svg')}}" alt="lang" class="w-[25px] h-25px">
            <div class="hidden absolute flex-col shadow-sm p-2 rounded top-[20px] right-0 w-[200px] bg-white text-black">
                <label>{{__('messages.choose_language')}}</label>
                <hr/>
                <a href="/language/ar"  class="text-black p-2 hover:bg-orange-500 hover:text-white">{{__('messages.arabic')}}</a>
                <a href="/language/en" class="text-black p-2 hover:bg-orange-500 hover:text-white">{{__('messages.english')}}</a>
            </div>
        </div>

        <form action="/logout" method="post">
            @csrf
            <button class="border border-orange-500  p-2 rounded-md w-[200px] hover:bg-orange-500 text-white transition-all">{{__('messages.logout')}}</button>
        </form>
    </div>
</header>
