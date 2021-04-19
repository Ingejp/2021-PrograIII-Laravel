<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table='marca';
    public $timestamps=false;
    protected $fillable=[
        'id_marca', 'descripcion'
    ];

    protected $primaryKey='id_marca';
}
