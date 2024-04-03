<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;

class CuentaController extends Controller
{
    public function index(){
        $cuentas = Cuentas::all();

        return view('cuentas.index', ['cuentas' => $cuentas]);
    }

    public function create(){
        return view('cuentas.createAccount');
    }

    public function store(Request $request){
        $request->validate([
            'plataforma_id' => 'required|integer',
            'correo' => 'required|email',
            'n_perfiles'=>'required|integer',
        ]);

        Cuenta::create([
        'plataforma_id' => $request->plataforma_id,
        'correo' => $request->correo,
        'n_perfiles'=> $request->n_perfiles,
    ]);

     return redirect()->route('cuentas.create')->with('success', 'Cuenta creada correctamente');
    }

    
}
