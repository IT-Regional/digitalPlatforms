<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $fillable = ['cuenta_id', 'nombre', 'contraseña', 'fecha_inicio', 'pin_usuario'];
    protected $table = 'perfiles';
    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }
}
