<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\usersInformation;
use App\Models\empresas;
use App\Models\sucursales;
use Illuminate\Support\Facades\Auth;

class SucursalesController extends Controller
{
    public function nuevo(){
    $usuario = usersInformation::where('idUser',auth()->user()->id)->first();
    $idempresa = $usuario->idEmpresa;
    $empresa = empresas::where('id',$idempresa)->first();
    return view('sucursales.nuevo',['empresa'=>$empresa]);
   }

    public function store(Request $request){
    $request->validate(
    [   'idEmpresa'=> ['required','integer'],
        'nombre'=> ['required','string'],
        'domicilio'=> ['required','string'],
    ]);

    $sucur = new sucursales;
    $sucur->idEmpresa = $request->input('idEmpresa');
    $sucur->nombre = $request->input('nombre');
    $sucur->domicilio = $request->input('domicilio');
    $sucur->save();

    return view('notas.index');
}
}
