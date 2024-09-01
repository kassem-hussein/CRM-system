<aside class="pt-6  bg-slate-900 w-[100vw] sm:sticky sm:top-0  h-[100vh] sm:w-[200px] transition-all duration-500  fixed z-40 top-0 left-[-640px]  overflow-hidden">
    <div class="text-lg text-center text-white flex px-6">
        <span id="close-menu" class="sm:hidden cursor-pointer bg-orange-500 rounded-full w-[25px] h-[25px] flex items-center justify-center">X</span>
        <div class="flex-1 text-center">CRM System</div>
    </div>
    <ul class="pt-6" id="menu" >
        <li class="p-2 " id="dash-link" ><a href="/" class="p-2 hover:text-orange-500 transition-all">{{__('messages.dashboard')}}</a></li>
        <li class="p-2" id="customers-link" ><a href="/customers" class="p-2 hover:text-orange-500 transition-all">{{__('messages.customers')}}</a></li>
        <li class="p-2" id="leads-link"   ><a href="/leads" class="p-2 hover:text-orange-500 transition-all">{{__('messages.leads')}}</a></li>
        <li class="p-2" id="contacts-link"><a href="/contacts" class="p-2 hover:text-orange-500 transition-all">{{__('messages.contacts')}}</a></li>
        <li class="p-2" id="products-link"><a href="/products" class="p-2 hover:text-orange-500 transition-all">{{__('messages.products')}}</a></li>
        <li class="p-2" id="opportunities-link"><a href="/opportunities" class="p-2 hover:text-orange-500 transition-all">{{__('messages.opportunities')}}</a></li>
        <li class="p-2" id="sales-link"><a href="/sales" class="p-2 hover:text-orange-500 transition-all">{{__('messages.sales')}}</a></li>
        <li class="p-2" id="activities-link"><a href="/activities" class="p-2 hover:text-orange-500 transition-all">{{__('messages.activities')}}</a></li>
        <li class="p-2" id="tasks-link"><a href="/tasks" class="p-2 hover:text-orange-500 transition-all">{{__('messages.tasks')}}</a></li>
        @if (Auth::user()->role == "Admin")
            <li class="p-2" id="users-link"><a href="/users" class="p-2 hover:text-orange-500 transition-all">{{__('messages.users')}}</a></li>
        @endif
    </ul>
</aside>
