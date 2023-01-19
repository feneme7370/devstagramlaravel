@extends('layouts.app')

@section('titulo')
    Crea publicacion
@endsection

@push('style')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:justify-between md:items-center gap-2">
        {{-- AGREGAR IMAGEN --}}
        <div class="md:w-1/2 px-10">
            <form class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center" 
                action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone">
                @csrf
            </form>
        </div>
        {{-- AGREGAR DATOS FORMULARIO --}}
        <div class="md:w-1/2 px-10 bg-white p-6 rounded-lg shadow-lg md:mt-0">
            <form action=" {{route('posts.store')}} " method="POST">
                @csrf

                {{-- titulo --}}
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="titulo" id="">
                        Titulo
                    </label>
                    <input
                        class="border p-3 w-full rounded-lg 
                            @error('name') border-red-500 @enderror" 
                        type="text" name="titulo" id="titulo" placeholder="Tu titulo" value="{{old('titulo')}}" autofocus
                    >
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message}}
                        </p>
                    @enderror
                </div>

                {{-- descripcion --}}
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="descripcion" id="">
                        Descripcion
                    </label>
                    <textarea
                        class="border p-3 w-full rounded-lg 
                            @error('name') border-red-500 @enderror" 
                        name="descripcion" id="descripcion" placeholder="Tu descripcion"
                    >{{old('descripcion')}}</textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message}}
                        </p>
                    @enderror
                </div>

                {{-- imagen --}}
                <div class="mb-5">
                    <input 
                        type="hidden"
                        name="imagen"
                        value="{{old('imagen')}}"
                    />
                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message}}
                        </p>
                    @enderror
                </div>

                {{-- submit --}}
                <input
                    class="w-full bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg" 
                    type="submit" value="Crear publicacion"
                >
            </form>
        </div>
    </div>
@endsection