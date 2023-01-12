<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\cliente;

class ClientesController extends Controller
{
    public function __construct(){
    $this->middleware('auth');
  }

  public function editar(Request $request){
  $n = DB::table('clientes')->where('id',$request->input('id'))->first();
  $celular = $n->celular;
  $nombre = $n->nombre;
  return view ('clientes.update',['id'=>$request->input('id'),'celular'=>$celular,'nombre'=>$nombre]);
}

public function update(Request $request){
  $id = $request->input('id');
  $celular = $request->input('celular');
  $nombre = $request->input('nombre');
  DB::table('clientes')->where('id',$id)->update(['celular' =>$celular]);
  DB::table('clientes')->where('id',$id)->update(['nombre' =>$nombre]);
  session()->flash('status',"Cliente $id, actualizado");
  return to_route('clientes.inicioClientes');
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

  public function store(Request $request){
  $request->validate(
    [   'celular'=> ['required','digits:10','numeric','unique:clientes,celular'],
        'nombre'=> ['required','string']
      ]);
  $cliente= new cliente;
  $cliente->idEstado = '1';
  $cliente->nombre = $request->input('nombre');
  $cliente->celular = $request->input('celular');
  $cliente->save();
  $idc = cliente::latest('id')->first();
  $idr = $idc->id;
  session()->flash('status',"ID cliente: $idr");
  return to_route('clientes.inicioClientes');
}

  public function nuevo(){
    return view ('clientes.nuevo');
  }

}
