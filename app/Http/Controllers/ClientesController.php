<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;

class ClientesController extends Controller
{
      public function __construct(){
    $this->middleware('auth');
  }

    public function search(Request $request){
     $request->validate(
      ['id'=> ['required','numeric'],
    ]);
    $n = cliente::find($request->input('id'));
    if(is_null($n)){
     return view('clientes.inicioClientes');
    }
    return view ('clientes.show',['cliente' => $n]);
   }

     public function eliminarCliente(cliente $idc){
    $idc->delete();
    return to_route('clientes.inicioClientes')->with('status','Cliente eliminado.');
  }


}
