@extends ('layouts/app')

@section('titulo')
    Iniciar sesion
@endsection


@section('contenido')
    <div class="md:flex justify-center md:gap-4 md:items-center">
        <div class="md:w-6/12">
            <img src="{{ asset('img/login.jpg')}}" alt="imagen login">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form method="POST" action=" {{route('login')}} ">
                @csrf

                {{-- si existe mensaje en session, que muestre --}}
                @if (session('mensaje')){
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ session('mensaje') }}
                    </p>
                }
                    
                @endif

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
                    <input type="checkbox" name="remember" id="">
                    <label class=" text-gray-500 text-sm" for="">Mantener mi sesion abierta</label>
                </div>
                
                <input
                    class="w-full bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg" 
                    type="submit" value="Iniciar sesion"
                >
            </form>
        </div>
    </div>
@endsection