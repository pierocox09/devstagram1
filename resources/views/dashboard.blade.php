@extends('layouts.app')
@section('titulo')
Perfil de: {{$user->username}}
@endsection
@section('contenido')


    <div class="flex justify-center" >
        {{-- div contenedor --}}
         <div class="w-full celular:w-8/12 lg:w-6/12 flex flex-col items-center celular:flex-row ">
            {{-- div contenedor de imagen --}}
            <div class="w-8/12 lg:w-6/12 px-5 items-end">
                @if ( $user->imagen )
                <img  class="  rounded-lg  " src="{{asset('perfil'.'/'.$user->imagen)}}" alt="Imagen de Usuario : {{$user->imagen}}"/>

                @else
                <img src="{{asset('img/usuario.svg')}}" alt="Imagen de Usuario : {{$user->imagen}}" >
                @endif
             

            
            </div>
            {{-- div contenedo de imagen --}}
            {{-- div contenedor de datos --}}
            <div class="celular:w-8/12 lg:w-6/12 px-5 flex items-center flex-col   celular:justify-center py-10 celular:items-start">
           <div class="flex gap-2">
           <p class="text-gray-700 text-2xl"> {{$user->username}}  </p>
            @auth
                @if($user->id===auth()->user()->id)
                <a  href="{{route('perfil.index' ,['user'=>$user->username])}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                      </svg>
                </a>
 
                @endif
            @endauth
            </div>
            <p class="text-gray-700 text-sm mb-3 font-bold"> 
                {{$user->followers()->count()}}
                <span class="font-normal"> @Choice('Seguidor|Seguidores', $user->followers()->count())  </span>
            </p>    
            <p class="text-gray-700 text-sm mb-3 font-bold"> 
                {{$user->followings()->count()}} 
                <span class="font-normal"> Siguiendo </span>
            </p>   
            <p class="text-gray-700 text-sm mb-3 font-bold"> 
                {{$user->posts->count()}}
                <span class="font-normal">  Post </span>
            </p>
            @auth
                @if(auth()->user()->id!==$user->id)
                 
                @if (!$user->siguiendo(auth()->user()))
                    
               
          
            <form action="{{route('users.follow',$user)}}"
             method="POST" class="m-0" >
                @csrf
                <input type="submit" name="follow" class=" text-white uppercase rounded-lg px-3
                py-1 text-xs font-bold cursor-pointer bg-slate-800" value="Segir">
             </form>
             @else
             <form action="{{route('users.unfollow',$user)}}"
             method="POST" class="m-0" >
                @csrf
                @method('DELETE')
                <input type="submit" name="follow" class=" text-white uppercase rounded-lg px-3
                py-1 text-xs font-bold cursor-pointer bg-red-700" value="Dejar de Segir">
             </form>   
             
             @endif
             @endif



             @endauth

            {{-- div segidor --}}
           
            </div>


            {{-- div contenedor de datos --}}
 

         </div>
         {{-- div fin contenedor --}}
         
    </div>   

    <section class="container mx-auto mt-10"> 
        <h2 class="text-xl text-center font-black my-10"> Publicaciones</h2>

        
         
        <x-listar-post :posts="$posts" />
     </section> 

@endsection
    