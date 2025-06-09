<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tipo',
        'fecha_generacion',
        'contenido',
        'formato',
        'filtros',
        'user_id',
    ];

    public function r_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
