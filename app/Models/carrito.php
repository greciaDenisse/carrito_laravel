<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
    protected $table= 'carrito';
    public $timestamps = false;
    protected $fillable = [
        "id_usuario",
        "id_producto",
        "tituloProducto",
        "precio",
        "cantidad"

    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', "id_usuario");
    }
    public function producto()
    {
        return $this->belongsTo(Produtos::class,"id_producto", "id_producto" );
    }
}
