<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function store(Request $request){
      
        $imagen=$request->file('file');

        $nombreImagen=  Str::uuid().".".$imagen->extension();

        $imagenservidor=Image::make($imagen);
        $imagenservidor->fit(800,800);

        $imagenPath= public_path('uploads').'/'.$nombreImagen; //Crea la imagen en la carpeta
        $imagenservidor->save($imagenPath);


        return response()->json(['imagen'=>$nombreImagen]);

    }
}
