<div>
    @if(($posts->count())>0)
        
    <div class="grid gap-8 justify-center content-center celular:grid-cols-2 tablet:grid-cols-3 desktop:grid-cols-4" >  
     @foreach ( $posts as $post )
         <div>
            <a href="{{route('posts.show' ,['post'=> $post ,'user'=>$post->user])}}">
                <img src="{{ asset('uploads').'/'.$post->imagen}}" alt="Imagen de post {{ $post->titulo}}">
            </a>
         </div>
     @endforeach
     
    </div>
    <div  class="my-10"> 
        {{$posts->links()}}
      </div>
        
    @else 
            <p class="text-center text-xl font-black"> {{$user->name}}:No tiene Publicaciones</p>
    @endif

</div>