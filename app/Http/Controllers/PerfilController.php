<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(User $user)
    {
        
     if($user->id===auth()->user()->id)
      
       return view('perfil.index',[
        'user' => $user,
    ]); 
     else {
        return redirect()->route('perfil.index',['user' => $user->username]);
     }
    }


    

    public function store( Request $request ,User $user)
    {
        $request->request->add(['username' => Str::slug($request->username,'-','es')]);
            $this->validate($request,[
             'username'=>['required','unique:users,username,'.auth()->user()->id,'min:3','max:20' ,'not_in:posts,logout,login,imagenes'],
            ]);
               
              

            if($request->imagen){
                $imagen=$request->file('imagen');
               

                $nombreImagen=  Str::uuid().".".$imagen->extension();
                $imagenservidor=Image::make($imagen);
                $imagenservidor->fit(800,800);
        
                $imagenPath= public_path('perfil').'/'.$nombreImagen; //Crea la imagen en la carpeta
                $imagenservidor->save($imagenPath);
           
            }
             //guardad cambios
             $usuario=User::find(auth()->user()->id);
             $usuario->username=$request->username;
             $usuario->imagen=$nombreImagen ?? '';
             $usuario->save();
             return redirect()-> route('posts.index' , ['user'=>$usuario]);
            
            
              
           
            
        
    }
}
