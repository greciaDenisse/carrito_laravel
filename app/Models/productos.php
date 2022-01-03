<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $table = "productos";
    protected $primaryKey = "id_producto";
    public $timestamps = false;
    protected $fillable = [
        "id_producto",
        "descripcion",
        "imagen",
        "precio",
        "titulo"
    ];
}
