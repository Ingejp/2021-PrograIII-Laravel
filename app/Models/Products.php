<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='producto';
    public $timestamps=false;
    protected $fillable=[
        'id_producto', 'codigo_producto', 'nombre', 'descripcion'
    ];

    protected $primaryKey='id_producto';
}
