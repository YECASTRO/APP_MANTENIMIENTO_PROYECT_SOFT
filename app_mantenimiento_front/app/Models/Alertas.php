<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alertas extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        "id",
        "fecha_hora",
        "tipo",
        "descripcion",
        "estado",
        "fecha_resolucion",
        "notas_resolucion",
        "equipo_id",
        "user_id"
    ];

    public function a_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function a_equipo(): BelongsTo
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }
}
