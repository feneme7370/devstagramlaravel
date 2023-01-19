<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        // modificar request para duplicidad de username
        $request->request->add(['username' => Str::slug($request->username)]);
        // validacion
        $this->validate($request, [
            //en unique se puede guardar el mismo, sino daria error que ya existe
            'username' => ['required', 'min:4', 'max:30', 'unique:users,username,'.auth()->user()->id, 'not_in:editar-perfil,twitter'],
            'email' => ['required', 'email', 'max:50', 'unique:users,email,'.auth()->user()->id],
        ]);

        if($request->password && $request->password_new){
                   // validacion
            $this->validate($request, [
                //en unique se puede guardar el mismo, sino daria error que ya existe
                'password' => ['required', 'current_password'],
                'password_new' => ['required','min:6'],
            ]); 
        }

        // guardar imagen
        if($request->imagen){
                //pedido de un archivo con el name 'file'
                $imagen = $request->file('imagen');
                
                //generar codigo unico y anexar extencion
                $nombreImagen = Str::uuid() . "." . $imagen->extension();

                //recortar imagen
                $imagenServidor = Image::make($imagen);
                $imagenServidor->fit(1000, 1000);

                //establecer ruta para el almacenamiento
                $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
                $imagenServidor->save($imagenPath);
        }

        // guardar cambios
        $usuario = User::find(auth()->user()->id);

        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';
        
        if($request->password && $request->password){
            $usuario->password = Hash::make($request->password_new);
        }

        $usuario->save();

        //redireccionar, se pone $usuario por si lo modifico
        return redirect()->route('posts.index', $usuario->username);
    }
}
