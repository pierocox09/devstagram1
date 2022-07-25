@extends('layouts.app')
@section('titulo')
crea tu post
@endsection
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
<div class=" w-full mb-2 my-0 block uppercase  bg-white p-10 tablet:flex justify-around tablet:gap-10 tablet:items-center p-5">
    <div class="tablet:w-1/2 mx-5 mb-5 ">
        <form action="{{route('imagen.store')}}"  method="POST"  enctype="multipart/form-data"
        id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
        @csrf
        </form>
        
    </div>

     <div class=" w-full p-7  tablet:w-1/2    tablet:mx-5 tablet:mr-8  bg-white p-10 rounded-lg shadow-xl ">
        <form  method="POST" novalidate action="{{route('posts.store')}}">
            @csrf
            <div class="mb-2">
                    <label for=titulo class="mb-2 block uppercase text-gray-500 font-bold ">Titulo</label>  
                    <input  
                        id="titulo" 
                        name="titulo"
                        type="text"
                        placeholder="Titulo de La Publicacion"
                        class="w-full border p-2 rounded-lg @error('titulo') border-red-500 @enderror" 
                        value="{{old('titulo')}}"

                    /> 
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-center p-2 text-sm "> {{$message}}</p> 

                    @enderror

            </div> 
            <div class="mb-2">
                <label for=descripcion class="mb-2 block uppercase text-gray-500 font-bold "> Descripcion  </label>
                <textarea 
                    id="descripcion" 
                    name="descripcion"
                    placeholder="Descripcion de La Publicacion"
                    class="w-full border  rounded-lg h-20 @error('descripcion') border-red-500 @enderror">  {{old('descripcion')}}</textarea> 
                @error('descripcion')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-center p-2 text-sm "> {{$message}}</p> 

                @enderror

        </div> 
        <div class="mb-2">
           <input name="imagen" type="hidden" value="{{ old('imagen') }}"/>
        </div>
        @error('imagen')
        <p class="bg-red-500 text-white my-2 rounded-lg text-center p-2 text-sm "> {{$message}}</p> 

         @enderror
      

        <input type="submit" value="Crear Post" class="bg-sky-600 hover:bg-sky-800 transition-colors 
                    cursor-pointer uppercase mt-4 font-bold w-full p-3 text-white rounded-lg  ">
                   
     </div>  
 </div>
</div >
@endsection