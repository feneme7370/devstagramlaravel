<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request){
        // validacion
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //si no esta autenticado, vuelve atras del post al get, y con with crea mensaje en $_SESSION
        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        //redireccionar al muro y pasar nombre para reconocer url dinamica
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
