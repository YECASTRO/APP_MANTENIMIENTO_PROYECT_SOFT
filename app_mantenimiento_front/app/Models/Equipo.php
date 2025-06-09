<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipo extends Model
{
    use HasFactory;
    protected $fillable =
    [
        "id",
        'nombre',
        'marca',
        'modelo',
        'numero_serie',
        'fecha_adquisicion',
        'ubicacion',
        'manual_usuario',
        'img_equipo',
        'color_equipo'
    ];    
}
