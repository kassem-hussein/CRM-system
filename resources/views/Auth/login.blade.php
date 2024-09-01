@extends('Layout.Auth.Layout')
@section('title')
    Login
@endsection
@section('content')
    <div class="flex flex-col h-[100vh] justify-center items-center">
        <div class="text-center font-medium">
            Customer Relation Management System
        </div>
        <form class="flex flex-col justify-center gap-2 mt-5 w-full  sm:w-2/4" action="login" method="post">
            @csrf
            @if (session()->get('error'))
                <div class="bg-red-500 text-white p-2 rounded ">{{session()->get('error')}}</div>
            @endif
            <label for="username" required>Username</label>
            <input type="text" id="username" name="username" />
            @if ($errors->has('username'))
                <div class="error">{{$errors->first('username')}}</div>
            @endif
            <label for="password" required>Password</label>
            <input type="password" id="password" name="password"/>
            @if ($errors->has('password'))
                <div class="error">{{$errors->first('password')}}</div>
            @endif
            <button class="bg-slate-900 text-white p-2 rounded">Login</button>
        </form>
    </div>
@endsection
