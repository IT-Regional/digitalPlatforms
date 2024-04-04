<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;
    protected $fillable= ['plataforma_id', 'correo', 'n_perfiles'];

    public function perfiles(){
        return $this->hasMany(Perfil::class);
    }

}
