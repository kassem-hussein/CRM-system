<!DOCTYPE html>
<html lang="{{Config::get('app.locale') == 'ar' ? "ar" : "en"}}" dir="{{Config::get('app.locale') == 'ar' ? "rtl" : "ltr"}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    @vite('resources/css/app.css')
</head>
<body>
    <main style="margin:1cm">
        <h1 class="text-center" style="font-family: Poppins;font-weight: 600">CRM System Infromation Printer</h1>
        <div class="flex justify-end">
            <button id="btn-print" onclick="print()" class="bg-slate-900 text-white p-2 rounded">Print</button>
        </div>
        @yield('content')
    </main>
</body>
</html>
