@extends ('layouts/app')

@section('titulo')
    Registrar
@endsection


@section('contenido')
    <div class="md:flex justify-center md:gap-4 md:items-center">
        <div class="md:w-6/12">
            <img src="{{ asset('img/registrar.jpg')}}" alt="Imagen Crear Cuenta">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action=" {{route('register')}} " method="POST">
                @csrf
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="name" id="">
                        Nombre
                    </label>
                    <input
                        class="border p-3 w-full rounded-lg 
                            @error('name') border-red-500 @enderror" 
                        type="text" name="name" id="name" placeholder="Tu nombre" value="{{old('name')}}" autofocus
                    >
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="username" id="">
                        Username
                    </label>
                    <input
                        class="border p-3 w-full rounded-lg
                            @error('username') border-red-500 @enderror" 
                        type="text" name="username" id="username" placeholder="Tu username" value="{{old('username')}}"
                    >
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="email" id="">
                        Email
                    </label>
                    <input
                        class="border p-3 w-full rounded-lg
                            @error('email') border-red-500 @enderror" 
                        type="email" name="email" id="email" placeholder="Tu email" value="{{old('email')}}"
                    >
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="password" id="">
                        Password
                    </label>
                    <input
                        class="border p-3 w-full rounded-lg
                            @error('password') border-red-500 @enderror" 
                        type="password" name="password" id="password" placeholder="Tu password"
                    >
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message}}
                        </p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="password_confirmation" id="">
                        Repetir Password
                    </label>
                    <input
                        class="border p-3 w-full rounded-lg" 
                        type="password" name="password_confirmation" id="password_confirmation" placeholder="Repetir tu password"
                    >
                </div>

                <input
                    class="w-full bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg" 
                    type="submit" value="Crear cuenta"
                >
            </form>
        </div>
    </div>
@endsection