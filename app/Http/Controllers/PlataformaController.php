<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plataforma;

class PlataformaController extends Controller
{

    public function index(){
        $plataformas = Plataforma::all();
        return view('plataformas.index', ['plataformas' => $plataformas]);
    }

    public function create()
{
    return view('plataformas.createPlatfomr');
}

/* public function cuentas($plataformaId)
{
    $plataforma = Plataforma::findOrFail($plataformaId);
    $cuentas = $plataforma->cuentas;
    
    return view('plataformas.cuentas', compact('cuentas'));
} */

public function cuentas($plataformaId)
{
    $plataforma = Plataforma::findOrFail($plataformaId);
    $cuentas = $plataforma->cuentas()->with('perfiles')->get();
    
    return view('plataformas.cuentas', compact('cuentas'));
}

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'perfiles_disponibles' => 'required|integer',
        'perfiles_ocupados' => 'required|integer',
    ]);

    Plataforma::create([
        'nombre' => $request->nombre,
        'perfiles_disponibles' => $request->perfiles_disponibles,
        'perfiles_ocupados' => $request->perfiles_ocupados,
    ]);

    return redirect()->route('plataformas.create')->with('success', 'Plataforma creada correctamente');
}

}
