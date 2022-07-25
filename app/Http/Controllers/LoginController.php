<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request ){
        
        //verificar si el usurio esta autentificado
        $this->validate($request , [
            'email'=> 'required',
            'password'=> 'required|',
        ]);
        
        if(! auth()->attempt([
            'username'=>$request->email,    
            'password'=>$request->password,
        ],$request->recuerdame)) 
        
        

        {
            // if(! auth()->attempt([
            //     'username'=>$request->email,
            //     'password'=>$request->password,
            // ],$request->recuerdame))    
            // {
            //     return back()->with('mensaje','Verifique  los datos');
            // }

           return back()->with('mensaje','Email o Contraseña Incorrecta');
        }




        return redirect()->route('posts.index' , auth()->user()->username);

    }
}
