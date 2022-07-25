<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        @stack('styles')
        @vite('resources/css/app.css')
        @livewireStyles
        <title>Devstagram-@yield('titulo')</title>
        @vite('resources/js/app.js')    
    </head>
    <body class="bg-gray-100" >
        <header class="p-5 border-b bg-white shadow">  
        <div class="container mx-auto flex justify-between items-center">
     
            <a href="{{route('home')}}"class="text-3xl font-black ">Devstagram </a>
        
         <nav class="flex gap-2 items-center ">  
         @auth
         <a class="flex items-center justify- gap-2 bg-white p-2 border text-gray-600 rounder 
         text-sm uppercase font-bold cursor-pointer" href="{{route('posts.create')}}"> 
             Crear  
             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2
                 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
         </a>
         
         <a href="{{route('posts.index',auth()->user()->username)}}" class="font-bold uppercase text-gray-600 text-sm " >Hola:
            <span class="font-normal"> 
                {{auth()->user()->username}} 
            </span> 
         </a>

            <form class='m-0 p-0'  method="POST" action="{{route('logout')}}">
                @csrf
                <button  class=" m-0 p-0 font-bold  uppercase text-gray-600 text-sm ">
                    Cerrar Session
                </button>
             </form>
         @endauth

         @guest
         <a  href="{{route("login")}}" class="font-bold uppercase m-2 text-gray-600 text-sm ">Login</a>
         <a href="{{route("register")}}" class="font-bold uppercase text-gray-600 text-sm " >Crear Cuenta</a>
         @endguest
       

        </div>
    </header>
   
    <div class="container mx-auto mt-10 flex flex-col gap-3">
        
     
      <h2 class="text-center justify-center text-4xl font-bold mb-5"> @yield("titulo")  </h2>
        
      <div> @yield("contenido") </div>

    </div>


    <footer class="text-center p-5 text-gray-500  font-bold uppercase mt-10 ">  
            Devstagram -Todos los Derechos Reservados {{ now()->year}}
    </footer>

    @stack('scripts')  


  
    <script src="{{asset('js/app.js')}}"></script> 
    @livewireScripts    


        
    </body>
</html>
