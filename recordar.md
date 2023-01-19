<!-- Conofiguracion Laravel -->
@vite('resources/css/app.css')
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],

<!-- Route -->
Route::get('/muro', [PostController::class, 'index'])->name('posts.index');
//las llaves son variables y usa Route Model Building, luego de : es lo que esta en el modelo
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');

<!-- Blade -->
@extends
@section
@yield
@auth
@guest
@stack @push

filable error, es que debo poner que datos llegan desde el post en el modelo
response()->json($input);
<form>@csrf
value="{{old('email')}}"
class="@error('email') border-red-500 @enderror" 
@error('email')
    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
        {{ $message}}
    </p>
@enderror

<input type="checkbox" name="remember" id="">
name="password_confirmation"

{{ auth()->user()->username }}
{{ $user->username }}
{{ route('logout') }}
{{ now()->year }}
{{asset('img/usuario.svg')}}

session('mensaje')

<!-- Controller -->
return redirect()->route('login');
auth()->logout();
    public function __construct()
    {
        $this->middleware('auth');
    }
        public function index(User $user)
    {
        return view('dashboard', [
            'user' => $user
        ]);
    }
    $this->validate($request, [
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);
    //si no esta autenticado, vuelve atras del post al get, y con with crea mensaje en $_SESSION
        auth()->attempt($request->only('email', 'password'))
        return back()->with('mensaje', 'Credenciales incorrectas');

    // modificar request para duplicidad de username
        $request->request->add(['username' => Str::slug($request->username)]);

User::create([
    'name' => $request->name,
    'username' => $request->username,//convierte string a url
    'email' => $request->email,
    'password' => Hash::make($request->password)//hashear
]);

<!-- Consola -->
php artisan make:controller --model --factory Post

php artisan tinker
Post::factory()
Post::factory()->times(200)->create();
exit;
volver a hacer proceso
