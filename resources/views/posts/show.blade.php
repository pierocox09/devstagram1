@extends('layouts.app')
@section('titulo')
{{strtoupper($post->titulo)}}

@endsection

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script> </script>
@endpush

@section('contenido')

    <div class="container mx-auto  flex flex-col justify-end  items-center 
    tablet:flex-row  flex-wrap gap-0 "> 

    <div class=" w-full laptop:w-1/2 flex-grow   bg-white flex flex-row justify-center items-center ">
     <div class=" m-5 ">
         <img  src="{{asset('uploads').'/'.$post->imagen}}" alt=" 'imagen  :'.$post->titulo "/>
            
      </div>
    </div>

    <div class= " w-full Alaptop:w-1/2 laptop:w-1/3   flex  flex-col    
               border-4 rounded-lg shadow-xl   flex-grow  ">
            {{-- div post comentarios --}}
            <div class=" bg-gray-50 dark:bg-gray-900 flex flex-col  items-center first-letter:justify-center border-2  ">
                <div class=" w-full  bg-white dark:bg-gray-800 shadow rounded-lg  ">
                 <div class=" flex   justify-between items-center border-2  ">
                  
                  <div class="flex mb-4 m-2">
                    
                  
                    <img class="w-12 h-12 rounded-full"  src="{{asset('perfil'.'/'.$post->user->imagen)}}"/>
                    <div class="ml-2 mt-0.5">
                      <span class="block text-start font-medium text-base m-0 leading-snug text-black dark:text-gray-100">{{$post->user->name}}</span>
                      <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">{{$post->created_at->diffForHumans()}}</span>
                      </div>
                    
                  </div>
                  <div class="m-2" >
                    {{-- botono eliminar --}}     
                    @auth  
                      @if($post->user_id===auth()->user()->id)
                      <form method="POST" action="{{route('posts.destroy',['post'=>$post ])}}" >
                        @method('DELETE')
                        @csrf 
                        <input type="submit" value="Elimiar publicacion "  
                        class=" bg-red-500 hover:bg-red-700 cursor-pointert text-[1rem] text-white p-1 rounded-lg"/>
                        </form>
                      @endif
                    @endauth
                   </div> 
                  </div>
                  <div class="border-2 p-2" >
                  <p class="text-gray-800 dark:text-gray-100 leading-snug celular:leading-normal text-justify">
                    {{$post->descripcion}}
                  </p>
                </div>
                    {{-- div likes --}}
                      @auth
                           <livewire:like-post :post="$post" />
                          @endauth          

                  {{--  mostrar comentarios --}}

                    @if ($post->comentarios->count())
                    
                  <div class="overflow-auto h bg-white "> 
                    @foreach ($post->comentarios as $comentario)
                  <div class="flex items-center text-justify  bg-white dark:bg-gray-800 border-0 ">
                    <div class="bg-white dark:bg-gray-800 text-black dark:text-gray-200 p-4 antialiased flex ">
                      
                      <img class="rounded-full h-8 w-8 mr-2 mt-1 " src="{{asset('perfil'.'/'.$comentario->user->imagen)}}"/>
                      <div>
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-3xl px-4 pt-2 pb-2.5">
                          <div class="font-semibold text-sm leading-relaxed">{{$comentario->user->name}}</div>
                          <div class="text-normal leading-snug tablet:leading-normal"
                          >{{$comentario->comentario}}</div>
                        </div>
                        <div class="text-sm ml-4 mt-0.5 text-gray-500 dark:text-gray-400">{{$comentario->created_at->diffForHumans()}}</div>
                      </div>
          </div>
          </div>  
          @endforeach

        </div> 
       
              {{-- div comentarios --}}
               @auth
              <div class="px-5 py-4 bg-white dark:bg-gray-800 shadow rounded-lg   flex border-2  ">
                <img class="w-12 h-12 mx-1 rounded-full" src="{{asset('perfil'.'/'.auth()->user()->imagen)}}"/>
               
                <form action="{{route('comentarios.store',['user'=>$user ,'post'=>$post])}}" method="POST" class="w-full mx-1  ">
                  @csrf  
                  <input type="text " class="rounded-lg w-full p-2 my-2  hover:border-2 border-black bg-slate-200"
                    placeholder="escriba su comentario" name="comentario">
                    @error('comentario')
                    <p class=" text-white bg-red-500 p-2 my-2 rounded-lg text-sm text-center">
                       {{$message}}</p>
                   @enderror
            </form>
            
          </div>
              @endauth

              @else() 

              @auth
              <div class="px-5 py-4 bg-white dark:bg-gray-800 shadow rounded-lg   flex border-2 m-0 w-full ">
                <img class="w-12 h-12 mx-1 rounded-full" src="{{asset('perfil'.'/'.auth()->user()->imagen)}}"/>
               
                <form action="{{route('comentarios.store',['user'=>$user ,'post'=>$post])}}" method="POST" class="w-full mx-1  ">
                  @csrf  
                  <input type="text " class="rounded-lg w-full p-2 my-2  hover:border-2 border-black bg-slate-200"
                    placeholder="escriba su comentario" name="comentario">
                    @error('comentario')
                    <p class=" text-white bg-red-500 p-2 my-2 rounded-lg text-sm text-center">
                       {{$message}}</p>
                   @enderror
            </form>
              </div>
             @endauth
                     

              @endif  

     </div>
        {{-- fin div a la izquierda --}}

    </div>

 
    @endsection
