<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresoRopa extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_ropa', 'tipo_ropa_detalle', 'cantidad', 'user_id']; // Añadir 'user_id'
    protected $table = 'ingresos_ropa';

    // Definir la relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
