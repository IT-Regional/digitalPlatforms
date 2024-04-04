<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Perfil;

class PerfilController extends Controller
{

    public function index(){
        $perfiles = Perfiles::all();

        return view('perfiles.index', ['perfiles'=> $perfiles]);
    }

    public function create()
    {
        $cuentas = Cuenta::withCount('perfiles')->get()->filter(function ($cuenta) {
            return $cuenta->perfiles_count < 5;
        });


        return view('perfiles.createProfile', compact('cuentas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cuenta_id' => 'required|integer',
            'nombre' => 'required',
            'contraseña' => 'required',
            'fecha_inicio' => 'required|date',
            'pin_usuario' => 'required|integer',
        ]);

        $cuenta = Cuenta::findOrFail($request->cuenta_id);
        if($cuenta->perfiles()->count() >= 5){
            return redirect()->back()->withErrors(['message' => 'La cuenta ha alcanzado el límite de 5 perfiles.']);
        }

        Perfil::create([
            'cuenta_id' => $request->cuenta_id,
            'nombre' => $request->nombre,
            'contraseña' => $request->contraseña,
            'fecha_inicio' => $request->fecha_inicio,
            'pin_usuario' => $request->pin_usuario,
        ]);

        return redirect()->route('perfiles.create')->with('success', 'Perfil creado correctamente');
    }
}
