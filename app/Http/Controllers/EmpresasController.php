<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empresas;

use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\usersInformation;
use App\Http\Controllers\Auth\RegisteredUserController;

class EmpresasController extends Controller
{
 public function inicioEmpresas(){
  $elementos = empresas::get();
  return view('empresas.inicioEmpresas', ['elementos'=>$elementos]);
}

public function search(Request $request){
 $request->validate(
    ['id'=> ['required','numeric'],
]);
   //$n = cliente::find($request->input('celular'));
 $t = empresas::where('id',$request->input('id'))->first();
 if(is_null($t)){
    return to_route('empresas.inicioEmpresas')->with('status','Empresa no encontrado.');
}
return view ('empresas.show',['empresa' => $t]);
}


public function ver($idr){
   $n = empresas::find($idr);
     return view('empresas.show',['empresa'=>$n]);//,$idr
 }

 public function store(Request $request){
  $request->validate(
    [
        'celulartitular'=> ['required','digits:12','numeric'],
        'titular'=> ['required','string'],
        'nombre'=> ['required','string'],
        'domicilio'=> ['required','string'],
        'colaboradores'=> ['required','numeric'],
        'administradores'=> ['required','numeric']
    ]);

   empresas::create([
    'nombre'=> $request->nombre,
    'titular'=> $request->titular,
    'celulartitular'=> $request->celulartitular,
    'domicilio'=> $request->domicilio,
    'colaboradores'=> $request->colaboradores,
    'administradores'=> $request->administradores,
    ]);
    return to_route('empresas.inicioEmpresas')->with('status','Empresa creada con éxito');
}


}
