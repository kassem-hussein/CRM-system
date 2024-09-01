<!DOCTYPE html>
<html lang="{{Config::get('app.locale')}}" dir="{{Config::get('app.locale') == 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRMS - @yield('title')</title>
    @vite('./resources/css/app.css')
</head>
<body>

    @if (session()->get('error'))
        <div id="error-alert" class="fixed top-20 transition-all duration-700 text-red-600  shadow border-l-4 border-l-red-500  rounded-r end-[-700px] bg-white  p-2 py-4 ">
            {{__('messages.'.session()->get('error'))}}
        </div>
    @endif
    @if(session()->get('success'))
        <div id="popup-signal"></div>
        <div id="popup" class="fixed bottom-[20px] transition-all duration-500 shadow-lg bg-white w-[300px] p-4 rounded border border-gray-200 border-b-4 border-b-green-600 end-[-700px] z-[999]">
            <div class="font-semibold">{{__(session()->get('success'))}}</div>
        </div>
    @endif
    <div id="alert" class="hidden">
        <div class="fixed top-0 left-0 w-[100vw] h-[100vh] bg-gray-600 opacity-25 z-10"></div>
        <div class="fixed flex items-center justify-center top-0 left-0 w-[100vw] h-[100vh] z-20">
            <div class="w-[320px] sm:w-[500px]  p-4 bg-white rounded shadow-md">
                <div id="alert-title" class="font-medium">{{__('messages.alert_title')}}</div>
                <div id="alert-description">{{__('messages.alert_description')}}</div>
                <div class="mt-4 flex items-end justify-end gap-1">
                    <button id="cancel-btn" class="p-2 bg-gray-500 rounded text-white">{{__('messages.cancel')}}</button>
                    <button id="delete-btn" class="p-2 bg-red-600 rounded text-white">{{__('messages.delete')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex">
        @include('Layout.Components.Aside')
        <main class="flex-1">
            @include('Layout.Components.Header')
            <div class="p-2">
                @yield('content')
            </div>
        </main>
    </div>
    @vite('./resources/js/app.js')
</body>
</html>
