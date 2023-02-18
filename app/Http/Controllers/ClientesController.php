<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\sucursales;
use App\Models\usersInformation;

class ClientesController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function editar(Request $request){
    $n = cliente::where('id',$request->input('id'))->first();
    $celular = $n->celular;
    $nombre = $n->nombre;
    return view ('clientes.update',['id'=>$request->input('id'),'celular'=>$celular,'nombre'=>$nombre]);
  }

  public function update(Request $request){
    $id = $request->input('id');
    $celular = $request->input('celular');
    $nombre = $request->input('nombre');
    cliente::where('id',$id)->update(['celular' =>$celular]);
    cliente::where('id',$id)->update(['nombre' =>$nombre]);
    session()->flash('status',"Cliente $id, actualizado");
    return to_route('clientes.inicioClientes');
  }

  public function search(Request $request){
   $request->validate(
    ['celular'=> ['required','numeric'],
  ]);
   $usuario = usersInformation::where('idUser',auth()->user()->id)->first();
   $idempresa = $usuario->idEmpresa;
   $t = cliente::where('idEmpresa',$idempresa)->where('celular',$request->input('celular'))->first();
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
    [
    'celular'=> ['required','digits:12','numeric','unique:clientes,celular'],
    'nombre'=> ['required','string'],
    'idEmpresa'=> ['required'],
  ]);
   cliente::create([
    'celular'=> $request->celular,
    'nombre'=> $request->nombre,
    'idEmpresa'=> $request->idEmpresa,
    'celular'=> $request->celular,
    'idEstado'=> 1,
    ]);
  return to_route('primerMensajePlantilla',[$request->celular,$request->nombre]);
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
   $usuario = usersInformation::where('idUser',auth()->user()->id)->first();
   $empresa = $usuario->idEmpresa;
   $sucursales = sucursales::where('idEmpresa',$empresa)->get();
   return view('notas.create',['fechaEntrega'=>$stringDate,'sucursales'=>$sucursales,'cliente'=>$Cliente]);
 }

 public function nuevo(){
  $usuario = usersInformation::where('idUser',auth()->user()->id)->first();
  $idempresa = $usuario->idEmpresa;
  return view('clientes.nuevo',['idEmpresa'=>$idempresa]);
}

public function inicioClientes(){
  $usuario = usersInformation::where('idUser',auth()->user()->id)->first();
  $idempresa = $usuario->idEmpresa;
  $elementos = cliente::where('idEmpresa',$idempresa)->get();
  return view('clientes.inicioClientes', ['elementos'=>$elementos]);
}

public function ver($idr){
 $n = cliente::find($idr);
     return view('clientes.show',['cliente'=>$n]);//,$idr
   }

 }
