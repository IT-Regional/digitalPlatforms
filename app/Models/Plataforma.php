<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'perfiles_disponibles', 'perfiles_ocupados'];

    public function cuentas()
    {
        return $this->hasMany(Cuenta::class);
    }
}
