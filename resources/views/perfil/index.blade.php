@extends ('layouts/app')

@section('titulo')
    Editar perfil {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store') }}" method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="username" id="">
                        Username
                    </label>
                    <input
                        class="border p-3 w-full rounded-lg 
                            @error('username') border-red-500 @enderror" 
                        type="text" name="username" id="username" placeholder="Tu username" value="{{ auth()->user()->username }}" autofocus
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
                        type="text" name="email" id="email" placeholder="Tu email" value="{{ auth()->user()->email }}" autofocus
                    >
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="imagen" id="">
                        Imagen perfil
                    </label>
                    <input
                        class="border p-3 w-full rounded-lg" 
                        type="file" 
                        name="imagen" 
                        id="imagen" 
                        value="" 
                        accept=".jpg,.png,.jpeg"
                        autofocus
                    >
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
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="password_new" id="">
                        Nuevo password
                    </label>
                    <input
                        class="border p-3 w-full rounded-lg
                            @error('password_new') border-red-500 @enderror" 
                        type="password" name="password_new" id="password_new" placeholder="Tu nuevo password"
                    >
                    @error('password_new')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message}}
                        </p>
                    @enderror
                </div>

                <input
                    class="w-full bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg" 
                    type="submit" value="Guardar cambios"
                >
            </form>
        </div>
    </div>
@endsection