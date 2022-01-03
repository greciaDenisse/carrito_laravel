<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;

class productosController extends Controller
{
    public function crearProductos (Request $request)
    {
        $productos              = new productos;
        $productos->decripcion  = $request->descripcion;
        $productos->imagen      = $request->imagen;
        $productos->precio      = $request->precio;
        $productos->titulo      = $request->titulo;
        $productos->save();

        return response()->json($productos,200);
    }

    public function actualizarProducto(Request $request)
    {
        $productos = productos::find($request->id_producto);

        $productos->decripcion  = $request->descripcion;
        $productos->imagen      = $request->imagen;
        $productos->precio      = $request->precio;
        $productos->titulo      = $request->titulo;
        $productos->save();


        return response()->json($productos,200);
    }

    public function obtenerProducto($id_producto){

        $productos = productos::where(['id_producto' => $id_producto])->first();

        return response()->json(['producto' => $productos]);

    }
    public function obtenerProductos()
    {
        $productos = productos::get();

        return response()->json(['productos' => $productos]);
    }

    public function borrarProducto($id_producto)
    {
        $productos =productos::find($id_producto);
        $productos->delete();
        return response()->json($productos,200);
    }
}
