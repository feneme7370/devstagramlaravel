<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){

        //pedido de un archivo con el name 'file'
        $imagen = $request->file('file');
        
        //generar codigo unico y anexar extencion
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        //recortar imagen
        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000, 1000);

        //establecer ruta para el almacenamiento
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);
    }
}
