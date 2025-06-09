<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mantenimiento extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'id',
        "tipo",
        "fecha_programada",
        "fecha_realizacion",
        "descripcion",
        "estado",
        "prioridad",
        "user_id",
        "equipo_id"
    ];

    public function m_equipo(): BelongsTo
    {
      return $this->belongsTo(Equipo::class, 'equipo_id');
    }

    public function m_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
