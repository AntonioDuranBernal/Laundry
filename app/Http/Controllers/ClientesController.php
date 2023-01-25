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
    ['celular'=> ['required','numeric'],
  ]);
   //$n = cliente::find($request->input('celular'));
   $t = DB::table('clientes')->where('celular',$request->input('celular'))->first();
   if(is_null($t)){
    return to_route('clientes.inicioClientes')->with('status','Cliente no encontrado.');
  }
  return view ('clientes.show',['cliente' => $t]);
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
  $cel = $request->input('celular');
  $cliente->idEstado = '1';
  $cliente->nombre = $request->input('nombre');
  $cliente->celular = $cel;
  $cliente->save();
  $idc = cliente::latest('id')->first();
  $idr = $idc->id;
  session()->flash('status',"Celular cliente: $cel Id cliente: $idr");
  return to_route('clientes.paranota',$cel);
}

public function paranota($cel){
 date_default_timezone_set('America/Mexico_City');
 $fecha_actual = date("Y-m-d h:m:s");
 $stringDate = date("Y-m-d",strtotime($fecha_actual."+ 3 days"));
 $C = cliente::where('celular',$cel)->first();
   $id = $C->id; //lugar de entrega depende el id del cliente
   $nombre = $C->nombre;
   $estado = $C->estado;
   $celular = $C->celular;
   $Cliente = array();
   $Cliente[0] = new cliente;
   $Cliente[0]->id = $id;
   $Cliente[0]->estado = $estado;
   $Cliente[0]->nombre = $nombre;
   $Cliente[0]->celular = $celular;

   return view('notas.create',['fechaEntrega'=>$stringDate,'lugarEntrega'=>1,'cliente'=>$Cliente]);
 }

 public function nuevo(){
  return view ('clientes.nuevo');
}

public function inicioClientes(){
  $elementos = cliente::get();
  return view('clientes.inicioClientes', ['elementos'=>$elementos]);
}

public function ver($idr){
 $n = cliente::find($idr);
     return view('clientes.show',['cliente'=>$n]);//,$idr
   }

 }
