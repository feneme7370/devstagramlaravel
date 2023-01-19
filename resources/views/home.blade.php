@extends ('layouts/app')

@section('titulo')
    Inicio
@endsection


@section('contenido')

    {{-- esto es un componente - <x-listar-post/> --}}

    {{-- <x-listar-post>
        <x-slot:titulo>Desde el slot</x-slot:titulo>
        <h1>Desde el slot</h1>
    </x-listar-post> --}}

    {{-- hay que poner variables en la parte php del componente en su constructor --}}
    <x-listar-post :posts="$posts" />


@endsection