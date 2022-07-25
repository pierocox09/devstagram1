@extends('layouts.app')

@section('titulo')
Editar Perfil de :{{$user->username}}
@endsection

@section('contenido')
<div class=" w-full  flex tablet:justify-center"> 
 <div class="tablet:w-1/2 bg-white shadow p-6">
    <form method="POST" action="{{ route('perfil.store',$user->username) }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
    @csrf
    <div class="mb-5">
    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold ">Username</label>
    <input id="username" 
    name="username" 
    type="text" 
    placeholder="Tu Nombre"
        class="w-full border p-3 rounded-lg @error('name') border-red-500 @enderror"
        value ={{$user->username , auth()->user()->username}} >
    </div>
    @error('username')
     <p class=" text-white bg-red-500 p-2 my-2 rounded-lg text-sm text-center">
        {{$message}}</p>
    @enderror

    <div class="mb-5">
        <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold ">Imagen</label>
        <input id="imagen" 
            name="imagen" 
             type="file"
            class="w-full border p-3 rounded-lg" 
            accept=".jpg,.jpeg ,.png"/>
        </div>
        
        <input type="submit" value="Guardar Cambios" class="bg-sky-600 hover:bg-sky-800 transition-colors 
                cursor-pointer uppercase mt-4 font-bold w-full p-3 text-white rounded-lg  ">

   </form>
 </div>


</div>

@endsection