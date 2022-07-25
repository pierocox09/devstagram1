<div  class="border-2 border-b-2 " >

    <div class="flex justify-between items-center m-2  mb-3">
        
            @auth
                {{-- div  likes --}}
                <div class="flex mx-2 border-2">
                    <button  wire:click="like">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                        fill="{{$like ? "red" : "white"}}" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                        <span class="ml-1 text-gray-500 dark:text-gray-400  font-light">{{$numerolikes}} Likes</span>
                </div>
                {{-- div fin likes --}}
                    {{--div comentarios  --}}
                <div class="ml-1 text-gray-500 dark:text-gray-400 font-light">{{$comentarios}} comentarios
                </div>
                {{-- div fin comentarios --}}
                
            @endauth

                @guest
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    </div>
                    
                    @endguest
        
    </div>
      
</div>
