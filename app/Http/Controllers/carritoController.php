<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carrito;
class carritoController extends Controller
{
    public function crearCarrito (Request $request)
    {
        $carrito                  = new carrito;
        $carrito->id_usuario      = $request->id_usuario;
        $carrito->id_producto     = $request->id_producto;
        $carrito->tituloProducto  = $request->tituloProducto;
        $carrito->precio          = $request->precio;
        $carrito->cantidad        = $request->cantidad;
        $carrito->save();

        return response()->json($carrito,200);
    }

    public function actualizarCarrito(Request $request)
    {
        $carrito = carrito::where(['id_producto' => $request->id_producto, 'id_usuario' => $request->id_usuario])->first();

        $carrito->id_usuario      = $request->id_usuario;
        $carrito->id_producto     = $request->id_producto;
        $carrito->tituloProducto  = $request->tituloProducto;
        $carrito->precio          = $request->precio;
        $carrito->cantidad        = $request->cantidad;
        $carrito->save();


        return response()->json($carrito,200);
    }

    public function obtenerProductoCarrito(Request $request){

        $carrito = carrito::where(['id_producto' => $request->id_producto, 'id_usuario' => $request->id_usuario])->first();

        return response()->json(['carrito' => $carrito]);

    }
    public function obtenerProdutosCarrito($id_usuario)
    {
        $carrito = carrito::where(['id_usuario' => $id_usuario])->get();

        return response()->json(['carrito' => $carrito]);
    }

    public function borrarProducto(Request $request)
    {
        $carrito = carrito::where(['id_producto' => $request->id_producto, 'id_usuario' => $request->id_usuario])->first();
        $carrito->delete();
        return response()->json($carrito,200);
    }
}
