<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register');
    }
    public function store(Request $request) 
    {
        // modificar request para duplicidad de username
        $request->request->add(['username' => Str::slug($request->username)]);
        // validacion
        $this->validate($request, [
            'name' => ['required', 'min:4', 'max:30'],
            'username' => ['required', 'min:4', 'max:30', 'unique:users'],
            'email' => ['required', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,//convierte string a url
            'email' => $request->email,
            'password' => Hash::make($request->password)//hashear
        ]);

        // autenticar usuario
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        // otra forma de autenticar
        //auth()->attempt($request->only('email', 'password'));

        // redireccionar
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
