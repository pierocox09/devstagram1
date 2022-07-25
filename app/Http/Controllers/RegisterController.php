<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //modificar el request
  

    public function index(){
        return view('auth.register');
    }
    public function store( Request $request){
        $request->request->add(['username' => Str::slug($request->username)]);
        $this->validate($request , [
            'name' =>'required|max:30',
            'username' =>'required|unique:users|min:3|max:20',
            'email' =>'required|unique:users|email',
            'password' =>'required|confirmed|min:6',
        ]);

        User::create(
            [
              'name'=>$request->name,
              'username'=>$request->username,
              'email'=>$request->email,
              'password'=>Hash::make($request->password),
            ]);
            //Autentificar a un usuario
             auth()->attempt([
              'email'=>$request->email,
              'password'=>$request->password,
             ]);

            //retronar un route
            return redirect()->route('posts.index',auth()->user()->username);
    }
     
}
