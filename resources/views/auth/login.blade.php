
@extends('layouts.app')

@section('titulo')
Inicia sesión en Devstagram
@endsection

@section('contenido')

     <div class="tablet:flex  tablet:justify-center mt-5  tablet:gap-6 tablet:items-center pb-5">
      {{--   div imagen --}}
        <div class=" w-full tablet:w-6/12 p-5">
                   <img src="{{asset('img/login.jpg')}}" alt="Imagen registro de Usuarios">
           </div>
           {{-- fin div imagen --}}
           {{-- Div formulario --}}
           <div class=" w-full tablet:w-4/12 bg-white p-6 rounded-lg shadow-md  ">
             <form action="{{route('login')}}" method="POST" novalidate >
                @csrf
             
                  @if(session('mensaje'))
                  <p class=" text-white bg-red-500 p-2 my-2 rounded-lg text-sm text-center">
                    {{session('mensaje')}}</p>
                  @endif
                
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold ">Email</label>
                    <input id="email" 
                    name="email" 
                    type="text" 
                    placeholder="Tu Email"
                    class="w-full border p-3 rounded-lg @error('email') border-red-500 @enderror"
                    value={{old('email')}}>
                </div>
                @error('email')
                     <p class=" text-white bg-red-500 p-2 my-2 rounded-lg text-sm text-center">
                        {{$message}}</p>
                    @enderror
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold ">Contraseña</label>
                    <input id="password" 
                    name="password" 
                    type="password" 
                    placeholder="Tu Contraseña"
                    class="w-full border p-3 rounded-lg @error('password') border-red-500 @enderror" >
                </div>
                @error('password')
                <p class=" text-white bg-red-500 p-2 my-2 rounded-lg text-sm text-center">
                   {{$message}}</p>
               @enderror
               <div> 
                <input type="checkbox" name="recuerdame"> 
                  <label class="text-gray-500 text-sm" >
                   Mantener Session abierta
                  </label>
               </div>
               
                <input type="submit" value="Iniciar Session" class="bg-sky-600 hover:bg-sky-800 transition-colors 
                cursor-pointer uppercase mt-4 font-bold w-full p-3 text-white rounded-lg  ">
            </form>
           {{-- fin formulario --}}
        </div>  
        {{-- fin div contenedor de formulario --}}
         
       </div>
       {{-- fin div contedor imagen y formulario --}}
     

@endsection

