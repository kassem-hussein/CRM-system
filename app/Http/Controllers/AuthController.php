<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function index(){
        $users = User::query()->paginate(5);
        return view('Auth.list',['users'=>$users]);
    }
    public function edit(String $id){
        $user =  User::findOrFail($id);
        return view('Auth.edit',['user'=>$user]);
    }
    public function update(Request $request,String $id){
        $user = User::findOrFail($id);
        $data = $request->validate([
            "name"=>"required|string",
            "username"=>[
                "required",
                Rule::unique('users')->ignore($user->id)
            ],
            "role"=>"required|string|in:Admin,saler"
        ]);
        $user->update($data);
        return redirect('/users')->with('success',"messages.update_user_m");
    }
    public function sinIn(){
        return view('Auth.login');
    }
    public function sinUp(){
        return view('Auth.register');
    }
    public function register(Request $request){
        $data = $request->validate([
            "name"=>"required|string",
            "username"=>"required|unique:users,id",
            "password"=>"required|confirmed|min:4",
            "role"=>"required|string|in:Admin,saler"
        ]);
        User::create($data);
        return redirect('/users')->with('success',"messages.add_user_m");
    }
    public function login(Request $request){
        $data = $request->validate([
            'username'=>"required|string",
            "password"=>"required|string"
        ]);
        if(Auth::attempt($data)){
            return redirect('/');
        }else{
            return back()->with('error','username or password not correct');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function destroy(String $id){
        $user =  User::findOrFail($id);
        $user->delete();
        return redirect('/users')->with('success','messages.delete_user_m');
    }
    public function print(){
        $users = User::all();
        return view('Auth.print',['users'=>$users]);
    }
}
