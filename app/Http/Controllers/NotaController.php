<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DateTime;
use Session;
use Illuminate\Http\Request;
use App\Models\nota;
use App\Models\Servicio;
use App\Models\detalleNotaServicio;
use App\Models\historialPago;

class NotaController extends Controller
{
  public function __construct(){
    $this->middleware('auth',['except'=>['welcome']]);
  }

  public function inicio(){
    return view ('inicio');
  }

  public function welcome(){
    return view ('welcome');
  }

  public function nuevanota(){
   date_default_timezone_set('America/Mexico_City');
   $fecha_actual = date("Y-m-d h:m:s");
   $stringDate = date("Y-m-d",strtotime($fecha_actual."+ 3 days"));
   return view('notas.create', ['fechaEntrega'=>$stringDate,'lugarEntrega'=>1,'idCliente'=>1]);
 }

 public function index(){
   $notas = nota::get();
   return view('notas.index', ['notas'=>$notas]);
 }

 public function datosEntregaMenu(Request $request){
  $n = DB::table('notas')->where('id',$request->input('idNota'))->first();
  $fechaEntrega = $n->fechaEntrega;
  $lugarEntrega = $n->lugarEntrega;
  $idCliente = $n->idCliente;
  return view ('notas.updateCreate',['idNota'=>$request->input('idNota'),'idCliente'=>$idCliente,'fechaEntrega'=>$fechaEntrega,'lugarEntrega'=>$lugarEntrega]);
}

public function updateCreate(Request $request){
  $id = $request->input('idNota');
  $fechaEntrega = $request->input('fechaEntrega');
  $lugarEntrega = $request->input('lugarEntrega');
  $idCliente = $request->input('idCliente');
  DB::table('notas')->where('id',$id)->update(['fechaEntrega' =>$fechaEntrega]);
  DB::table('notas')->where('id',$id)->update(['lugarEntrega' =>$lugarEntrega]);
  DB::table('notas')->where('id',$id)->update(['idCliente' =>$idCliente]);
  session()->flash('status',"Nota $id, actualizada");
  return to_route('notas.show',$id);
}


public function storeDatosCliente(Request $request){
  $request->validate(
    [   'idCliente'=> ['required','numeric'],
        'fechaEntrega'=> ['required','date_format:Y-m-d','after:tomorrow'],//H:i:s
        'lugarEntrega'=> ['required','numeric'],
      ]);

  $nota= new nota;
  $nota->idEstado = '1';
  $nota->idUsuarioSistema = '1';
  $nota->apunte = 'Sin apuntes';
  $nota->restante = null;
  $nota->fechaEntrega = $request->input('fechaEntrega');
  $nota->lugarEntrega = $request->input('lugarEntrega');
  $nota->idCliente = $request->input('idCliente');
  $nota->save();
  $idn = nota::latest('id')->first();
  $idr = $idn->id;
  return to_route('notas.indexdetallenotas',$idr);
}

public function datosPago(Request $request){
  $id= $request->input('idNota');
  $suma= DB::table('detalle_nota_servicios')->where('idNota',$id)->sum(\DB::raw('subtotal'));

  if ($suma>0) {
    DB::table('notas')->where('id',$id)->update(['idEstado' => 2]);
    DB::table('notas')->where('id',$id)->update(['restante' => $suma]);
    DB::table('notas')->where('id',$id)->update(['total' => $suma]);
    return view ('notas.datosPago',['idn'=>$id,'actual'=>$suma]);
  }else{
    session()->flash('status',"Se debe agregar al menos un servicio para continuar.");
    return to_route('notas.indexdetallenotas',$id);
  }
}

public function indexdetallenotas($idr){
 $detalles = DB::table('detalle_nota_servicios')->where('idNota', $idr)->get();
     return view('notas.createDetallesNota',['detalles'=>$detalles,'idr'=>$idr]);//,$idr
   }

   public function storeDetallesNota(Request $request){
    $request->validate(
        ['idServicio'=> ['required','numeric'], //mas de 0
        'costo'=> ['required','numeric','min:1'], //mas de 1 peso, max 6 digitos
        'cantidad'=> ['required','numeric'],//mas de 0
        'idElemento'=> ['required','numeric'],//mas de 0
      ]);

    $detalle= new detalleNotaServicio;
    $detalle->idNota = $request->input('idNota');
    $idr = $detalle->idNota;
    $costos = servicio::latest('costo')->where('idEmpresa', $request->input('costo'))->where('idServicio', $request->input('idServicio'))->where('idPrenda', $request->input('idElemento'))->first();
    $cos = $costos->costo;
    $co = (double)$cos;

    $detalle->cantidad = $request->input('cantidad');
    $cant = $detalle->cantidad;
    $ct = (double)$cant;

    $detalle->subtotal = $ct*$co;
    $detalle->descripcion = $request->input('descripcion');
    $detalle->idArticulo = $request->input('idElemento');
    $detalle->idServicio = $request->input('idServicio');
    $detalle->estado = '1';
    $detalle->save();

    $suma= DB::table('detalle_nota_servicios')->where('idNota', $request->input('idNota'))->sum(\DB::raw('subtotal'));

    session()->flash('status',"Costo al momento: $$suma");
    return to_route('notas.indexdetallenotas',$idr);
  }

  public function cancelarNota(Nota $idNota){
    $idNota->delete();
    return to_route('notas.index')->with('status','Nota cancelada.');
  }

  public function search(Request $request){
    $request->validate(
      ['id'=> ['required','numeric'],
    ]);
    //$id=rtrim($request->input('id'));
    $n = DB::table('notas')->where('id',$request->input('id') )->first();
    if(is_null($n)){
     return view('inicio');
   }
   $nd = DB::table('detalle_nota_servicios')->where('idNota', $request->input('id'))->get();
   return view ('notas.show',['nota'=>$n, 'detalles'=>$nd]);
 }

 public function todolisto(Request $request){
   $idr = $request->input('idNota');
   $nota = nota::where('id', '=',$idr)->first();
   $resta = $nota->restante;
   if ($resta>0) {
        DB::table('notas')->where('id',$idr)->update(['idEstado' => '12']);
        return to_route('notas.show',$idr)->with('status','Nota marcada como lista, con pago pendiente.');
      }else{
        DB::table('notas')->where('id',$idr)->update(['idEstado' => '14']);
        return to_route('notas.show',$idr)->with('status','Nota marcada como lista, con pago completo.');
      }
}

public function entregarNota(Request $request){
   $idr = $request->input('idNota');
   $nota = nota::where('id', '=',$idr)->first();
   $resta = $nota->restante;
   if ($resta>0) {
       return to_route('notas.historialPagos',$idr)->with('status','Nota con pago incompleto, no es posible entregar.');
      }else{
        DB::table('notas')->where('id',$idr)->update(['idEstado' => '16']);
        return to_route('notas.show',$idr)->with('status','Nota marcada como entregada.');
      }
  return to_route('notas.index')->with('status','Nota marcada como entregada.');
}

public function historialPagos($id){
  $hp = DB::table('historial_pagos')->where('idNota',$id)->get();
  return view ('notas.historialP',['hitorial'=>$hp,'idNota'=>$id]);
}

public function store(Request $request){
  $request->validate(
    [  'idCliente'=> ['required','numeric'],
        'fechaEntrega'=> ['required','date_format:Y-m-d','after:tomorrow'],//H:i:s
        'lugarEntrega'=> ['required','numeric'],
      ]);

  $nota= new nota;
  $nota->idEstado = '1';
  $nota->idUsuarioSistema = '1';
  $nota->fechaEntrega = $request->input('fechaEntrega');
      //$nota->fechaSalida = '---';
      //$nota->total = '0';
  $nota->idCliente = $request->input('idCliente');
  $nota->apunte = 'Sin apuntes';
  $nota->lugarEntrega = $request->input('lugarEntrega');
      //$nota->restante = null;
  $nota->save();

  $idn = nota::latest('id')->first();
  $idr = $idn->id;
  return to_route('notas.indexdetallenotas', $idr);
}

public function storepago(Request $request){
  $request->validate(
        ['importe'=> ['required','integer'],//0 o mayor
         'importeentregado'=> ['required','integer'],//
       ]);
  $idnota = $request->input('idNota');
  if ($idnota === null) {
   session()->flash('status',"Es null");
   return to_route('notas.index');
 }else{
   $nota = nota::where('id', '=',$request->input('idNota'))->first();
   $idr = $nota->id;
   $importe = $request->input('importe');
   $entregado = $request->input('importeentregado');
   $totalinicial= $nota->total;
   $totalrestante= $nota->restante;
   if ($entregado >= $importe) {
     $lopagado = $totalinicial-$totalrestante;
     $totalAEntregar = $lopagado+$importe;
     if ($totalAEntregar<=$totalinicial){
       if ($totalrestante==$totalinicial){
        $restante = $totalinicial-$importe;
        DB::table('notas')->where('id', $idr)->update(['restante' => $restante]);
        if ($restante>0) {
        DB::table('notas')->where('id', $idr)->update(['idEstado' => '10']);
        }else{
        DB::table('notas')->where('id', $idr)->update(['idEstado' => '15']);
        }
      }else{
        $restante = $totalrestante-$importe;
        DB::table('notas')->where('id', $idr)->update(['restante' => $restante]);
        if ($restante>0) {
        DB::table('notas')->where('id', $idr)->update(['idEstado' => '10']);
        }else{
        DB::table('notas')->where('id', $idr)->update(['idEstado' => '15']);
        }
      }
        $cambio = $entregado-$importe;
        $historia= new historialPago;
        $historia->idNota = $idr;
        $historia->idUsuarioSistema = $idr; //POR MODIFICAR USUARIOOOOOOOOOOOOOOOO
        $historia->importe = $importe;
        $historia->restante = $restante;
        $historia->save();
        session()->flash('status',"Cambio: $$cambio");
        return to_route('notas.show',$idr);
      }else{
        session()->flash('status',"La cantidad a entregar excede el costo total de la nota.");
        return view ('notas.datosPago',['idn'=>$idr,'actual'=>$totalrestante]);
      }
    }else{
      session()->flash('status',"La cantidad entregada debe ser mayor o igual al pago.");
      return view ('notas.datosPago',['idn'=>$idr,'actual'=>$totalrestante]);
    }
  }
}

public function registrarPago(Request $request){
  $request->validate(
    ['importe'=> ['required','integer'],
    'importeentregado'=> ['required','integer'],//
    ]);

  $idnota = $request->input('idNota');
  if ($idnota === null) {
   session()->flash('status',"Es null");
   return to_route('notas.index');
 }else{
   $nota = nota::where('id', '=',$request->input('idNota'))->first();
   $idr = $nota->id;
   $importe = $request->input('importe');
   $entregado = $request->input('importeentregado');
   if ($entregado >= $importe && $importe >0) {
     $totalinicial= $nota->total;
     $totalrestante= $nota->restante;
     $lopagado = $totalinicial-$totalrestante;
     $totalAEntregar = $lopagado+$importe;
     if ($totalAEntregar<=$totalinicial){
       if ($totalrestante==$totalinicial){
        $restante = $totalinicial-$importe;
        DB::table('notas')->where('id', $idr)->update(['restante' => $restante]);
        if ($restante>0) {
        DB::table('notas')->where('id', $idr)->update(['idEstado' => '10']);
        }else{
        DB::table('notas')->where('id', $idr)->update(['idEstado' => '15']);
        }
      }else{
        $restante = $totalrestante-$importe;
        DB::table('notas')->where('id', $idr)->update(['restante' => $restante]);
        if ($restante>0) {
        DB::table('notas')->where('id', $idr)->update(['idEstado' => '10']);
        }else{
        DB::table('notas')->where('id', $idr)->update(['idEstado' => '15']);
        }
      }
      $cambio = $entregado-$importe;
      $historia= new historialPago;
      $historia->idNota = $idr;
         $historia->idUsuarioSistema = $idr; //POR MODIFICAR USUARIOOOOOOOOOOOOOOOO
         $historia->importe = $importe;
         $historia->restante = $restante;
         $historia->save();
         session()->flash('status',"Cambio: $$cambio");
         return to_route('notas.show',$idr);
       }else{
        session()->flash('status',"La cantidad a entregar excede el costo total de la nota.");
        $hp = DB::table('historial_pagos')->where('idNota',$idr)->get();
        return view ('notas.historialP',['hitorial'=>$hp,'idNota'=>$idr]);
      }
    }else{
      session()->flash('status',"La cantidad entregada debe ser mayor o igual al pago.");
      $hp = DB::table('historial_pagos')->where('idNota',$idr)->get();
      return view ('notas.historialP',['hitorial'=>$hp,'idNota'=>$idr]);
    }
  }
}


public function show($id){
 $n = DB::table('notas')->where('id', $id)->first();
 $nd = DB::table('detalle_nota_servicios')->where('idNota', $id)->get();
 return view ('notas.show',['nota'=>$n, 'detalles'=>$nd]);
}

public function datosPagoMenu($id){
  $n = DB::table('notas')->where('id', $id)->first();
  $suma=$n->restante;
  return view ('notas.datosPago',['idn'=>$id,'actual'=>$suma]);
}

}
