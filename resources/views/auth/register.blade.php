
@extends('layouts.app')

@section('titulo')
Registrate en Devstagram
@endsection

@section('contenido')

     <div class="tablet:flex  tablet:justify-center mt-5  tablet:gap-6 tablet:items-center pb-5">
      {{--   div imagen --}}
        <div class= " w-full tablet:w-6/12 p-5">
                   <img src="{{asset('img/registrar.jpg')}}" alt="Imagen registro de Usuarios">
           </div>
           {{-- fin div imagen --}}
           {{-- Div formulario --}}
           <div class=" w-full tablet:w-4/12 bg-white p-6 rounded-lg shadow-md  ">
             <form action="{{route('register')}}" method="POST" novalidate >
                @csrf
                    <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold ">Nombre</label>
                    <input id="name" 
                    name="name" 
                    type="text" 
                    placeholder="Tu Nombre"
                        class="w-full border p-3 rounded-lg @error('name') border-red-500 @enderror"
                        value ={{old('name')}} >
                    </div>
                    @error('name')
                     <p class=" text-white bg-red-500 p-2 my-2 rounded-lg text-sm text-center">
                        {{$message}}</p>
                    @enderror
                    

                    <div class="mb-5">
                        <label for="username" class="mb-2 block uppercase text-gray-500 font-bold ">Username</label>
                        <input id="username" 
                        name="username" 
                        type="text" 
                        placeholder="Tu Nombre de Usuario" 
                        class="w-full border p-3 rounded-lg  @error('username') border-red-500 @enderror"
                        value ={{old('username')}}  >
                    </div>
                    @error('username')
                     <p class=" text-white bg-red-500 p-2 my-2 rounded-lg text-sm text-center">
                        {{$message}}</p>
                    @enderror
                
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
                    class="w-full border p-3 rounded-lg @error('password') border-red-500 @enderror"" >
                </div>
                @error('password')
                <p class=" text-white bg-red-500 p-2 my-2 rounded-lg text-sm text-center">
                   {{$message}}</p>
               @enderror
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold ">Confirmar Contraseña</label>
                    <input id="password_confirmation" 
                    name="password_confirmation" 
                    type="password" 
                    placeholder="Tu Email"
                    class="w-full border p-3 rounded-lg" >
                </div>
                <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-800 transition-colors 
                cursor-pointer uppercase mt-4 font-bold w-full p-3 text-white rounded-lg  ">
            </form>
           {{-- fin formulario --}}
        </div>  
        {{-- fin div contenedor de formulario --}}
         
       </div>
       {{-- fin div contedor imagen y formulario --}}
     

@endsection

