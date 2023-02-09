<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DateTime;
use Session;
use Illuminate\Http\Request;
use App\Models\Prenda;
use App\Models\nota;
use App\Models\Servicio;
use App\Models\cliente;
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
   $clientes = cliente::get();//segun elcliente se pone lugar de entrega
   return view('notas.create',['fechaEntrega'=>$stringDate,'lugarEntrega'=>1,'cliente'=>$clientes]);
 }

 public function index(){
   $notas = nota::get();
   return view('notas.index',['notas'=>$notas]);
 }

 public function ingresos(Request $request){
  date_default_timezone_set('America/Mexico_City');
  $fecha_actual = date("Y-m-d h:m:s");
  $stringDate = date("Y-m-d",strtotime($fecha_actual."-1 days"));
  $todos = historialPago::where('created_at','>',$stringDate)->get();
  return view('registro.ingresos',['todos'=>$todos]);
}

public function pendientes(Request $request){
  //con el estado, deberia mandar el nombre, para que vea más claro que esta pasand con su nota
  //$hp =nota::where('idCliente',$request->input('id'))->orderBy('idEstado','desc')->get();
  $hp =nota::where('idCliente',$request->input('id'))->where('idEstado', '<=','9')->where('idEstado', '>=','4')->get();
  return view ('notas.pendientesCliente',['notas'=>$hp,'idCliente'=>$request->input('id')]);
}

public function entreFechas(Request $request){
  $inicio = $request->input('inicio');
  $fin = $request->input('fin');
  $fechainicio = date("Y-m-d",strtotime($inicio));
  $fechafin = date("Y-m-d",strtotime($fin."+1 days"));
  $todos = historialPago::where('created_at','>=',$fechainicio)->where('created_at','<=',$fechafin)->get();
  //$todos = historialPago::where('created_at','>',$fechainicio)->get();
  return view('registro.ingresos',['todos'=>$todos]);
}

public function datosEntregaMenu(Request $request){
  $n = nota::where('id',$request->input('idNota'))->first();
  $fechaEntrega = $n->fechaEntrega;
  $lugarEntrega = $n->lugarEntrega;
  $idCliente = $n->idCliente;
  $clientes = nota::get();
  $DatosCliente = cliente::where('id',$idCliente)->first();
  return view ('notas.updateCreate',['nota'=>$n,'datoscliente'=>$DatosCliente,'cliente'=>$clientes]);
}

public function confirmado(Request $request){
  $n = nota::where('id',$request->input('idNota'))->firstOrFail();
  nota::where('id',$request->input('idNota'))->update(['idEstado' => 4]);
  nota::where('id',$request->input('idNota'))->update(['idEstadoConfirmacion' => 12]);
  $idCliente = $n->idCliente;
  $detalles = detalleNotaServicio::where('idNota',$request->input('idNota'))->get();

  $n = "LAVA EXPRESS | ". "Nota: ". $request->input('idNota') . "\n" .
  "Fecha de entrega: ". $n->fechaEntrega . "\n" .
  "Importe: $". $n->total . " Saldo a pagar: $". $n->restante .  "\n". "\n".
  "Detalles: " ."\n";
  foreach ($detalles as $registro) {
   $nombreart = $registro->nombreArticulo;
   $nombreser = $registro->nombreServicio;
   $cant = $registro->cantidad;
   $subtotal = $registro->subtotal;
   $n = $n."".$nombreser." de ".$nombreart." x".$cant.": " ." $".$subtotal. "\n";
 }
 $n = $n."\n";
     //$n = $n . "\n" . "No nos hacemos responsables por objetos y/o valores olvidados en las prendas. Gracias por su preferencia. " . "\n";
 $nota = $n;

 $DatosCliente = cliente::where('id',$idCliente)->first();
 $cel = $DatosCliente->celular;
 //DB::table('notas')->where('id',$request->input('idNota'))->update(['idEstado' =>25]);
 return to_route('AdelantoDado',['numero'=>$cel,'nota'=>$nota]);
}

public function updateCreate(Request $request){
  $id = $request->input('idNota');
  $fechaEntrega = $request->input('fechaEntrega');
  $lugarEntrega = $request->input('lugarEntrega');
  $idCliente = $request->input('idCliente');

  nota::where('id',$id)->update(['fechaEntrega' =>$fechaEntrega]);
  nota::where('id',$id)->update(['lugarEntrega' =>$lugarEntrega]);
  nota::where('id',$id)->update(['idCliente' =>$idCliente]);
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
  $suma= detalleNotaServicio::where('idNota',$id)->sum(\DB::raw('subtotal'));

  if ($suma>0) {
    nota::where('id',$id)->update(['idEstado' => 2]);
    nota::where('id',$id)->update(['restante' => $suma]);
    nota::where('id',$id)->update(['total' => $suma]);
    return view ('notas.datosPago',['idn'=>$id,'actual'=>$suma]);
  }else{
    session()->flash('status',"Se debe agregar al menos un servicio para continuar.");
    return to_route('notas.indexdetallenotas',$id);
  }
}

public function addDetalle($idr){
  $servicios = Servicio::get();
  $elementos = Prenda::get();
  return view('notas.addDetalle',['idr'=>$idr, 'servicios'=>$servicios, 'elementos'=>$elementos]);
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
  $registro = prenda::latest('costo')->where('idEmpresa', $request->input('costo'))->where('idservicio', $request->input('idServicio'))->where('id', $request->input('idElemento'))->first();
  $cos = $registro->costo;
  $co = (double)$cos;
  $detalle->cantidad = $request->input('cantidad');
  $cant = $detalle->cantidad;
  $ct = (double)$cant;
  $detalle->subtotal = $ct*$co;
  $detalle->descripcion = $request->input('descripcion');
  $detalle->idArticulo = $request->input('idElemento');
  $dprenda = Prenda::where('id',$request->input('idElemento'))->first();
  $detalle->nombreArticulo = $dprenda->nombre;
  $detalle->nombreServicio = $dprenda->servicio;
  $detalle->idServicio = $dprenda->idservicio;
  $detalle->estado = '1';
  //$detalle->idServicio = $request->input('idServicio');

  $detalle->save();

  $suma= detalleNotaServicio::where('idNota', $request->input('idNota'))->sum(\DB::raw('subtotal'));

  session()->flash('status',"Costo al momento: $$suma");
  return to_route('notas.indexdetallenotas',$idr);
}

public function indexdetallenotas($idr){
 $detalles = detalleNotaServicio::where('idNota', $idr)->get();
 return view('notas.createDetallesNota',['detalles'=>$detalles,'idr'=>$idr]);
}

public function cancelarNota(Nota $idNota){
  $idNota->delete();
  return to_route('inicio')->with('status','Nota cancelada.');
}

public function eliminar(Nota $idNota){
  $idNota->delete();
  return to_route('notas.index')->with('status','Nota cancelada.');
}

public function search(Request $request){
  $request->validate(
    ['id'=> ['required','numeric'],
  ]);
    //$id=rtrim($request->input('id'));
  $n = nota::where('id',$request->input('id') )->first();
  if(is_null($n)){
   return to_route('inicio')->with('status','Nota no encontrada.');
 }
 $nd = detalleNotaServicio::where('idNota', $request->input('id'))->get();
 return view ('notas.show',['nota'=>$n, 'detalles'=>$nd]);
}

public function todolisto(Request $request){
 $nota = nota::where('id', '=',$request->input('idNota'))->first();
 $resta = $nota->restante;
 if ($resta>0) {
  nota::where('id',$request->input('idNota'))->update(['idEstado' => '8']);
  return to_route('notas.show',$request->input('idNota'))->with('status','Nota marcada como lista, pago incompleto.');
}else{
  nota::where('id',$request->input('idNota'))->update(['idEstado' => '8']);
  return to_route('notas.show',$request->input('idNota'))->with('status','Nota marcada como lista, con pago cubierto.');
}
}

public function entregarNota(Request $request){
 $idr = $request->input('idNota');
 $nota = nota::where('id', '=',$idr)->first();
 $resta = $nota->restante;
 if ($resta>0) {
   return to_route('notas.historialPagos',$idr)->with('status','Nota con pago incompleto, no es posible entregar.');
 }else{
  nota::where('id',$idr)->update(['idEstado' => '10']);
  return to_route('notas.show',$idr)->with('status','Nota marcada como entregada.');
}
return to_route('notas.index')->with('status','Nota marcada como entregada.');
}

public function historialPagos($id){
  $hp =historialPago::where('idNota',$id)->get();
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
        nota::where('id', $idr)->update(['restante' => $restante]);
        if ($restante>0) {
          nota::where('id', $idr)->update(['idEstado' => '3']);
        }else{
          nota::where('id', $idr)->update(['idEstado' => '3']);
        }
      }else{
        $restante = $totalrestante-$importe;
        nota::where('id', $idr)->update(['restante' => $restante]);
        if ($restante>0) {
          nota::where('id', $idr)->update(['idEstado' => '3']);
        }else{
         nota::where('id', $idr)->update(['idEstado' => '3']);
       }
     }
     $cambio = $entregado-$importe;
     if ($importe>0) {
      $historia= new historialPago;
      $historia->idNota = $idr;
        $historia->idUsuarioSistema = $idr; //POR MODIFICAR USUARIOOOOOOOOOOOOOOOO
        $historia->importe = $importe;
        $historia->restante = $restante;
        $historia->save();
      }

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
        nota::where('id', $idr)->update(['restante' => $restante]);
        if ($restante>0) {
          nota::where('id', $idr)->update(['idEstado' => '3']);
        }else{
          nota::where('id', $idr)->update(['idEstado' => '3']);
        }
      }else{
        $restante = $totalrestante-$importe;
        nota::where('id', $idr)->update(['restante' => $restante]);
        if ($restante>0) {
          nota::where('id', $idr)->update(['idEstado' => '3']);
        }else{
          nota::where('id', $idr)->update(['idEstado' => '3']);
        }
      }
      $cambio = $entregado-$importe;
      if ($importe>0) {
        $historia= new historialPago;
        $historia->idNota = $idr;
         $historia->idUsuarioSistema = $idr; //POR MODIFICAR USUARIOOOOOOOOOOOOOOOO
         $historia->importe = $importe;
         $historia->restante = $restante;
         $historia->save();
       }
       session()->flash('status',"Cambio: $$cambio");
       return to_route('notas.show',$idr);
     }else{
      session()->flash('status',"La cantidad a entregar excede el costo total de la nota.");
      $hp = historialPago::where('idNota',$idr)->get();
      return view ('notas.historialP',['hitorial'=>$hp,'idNota'=>$idr]);
    }
  }else{
    session()->flash('status',"La cantidad entregada debe ser mayor o igual al pago.");
    $hp = historialPago::where('idNota',$idr)->get();
    return view ('notas.historialP',['hitorial'=>$hp,'idNota'=>$idr]);
  }
}
}


public function show($id){
 $n = nota::where('id', $id)->first();
 $nd = detalleNotaServicio::where('idNota', $id)->get();
 return view ('notas.show',['nota'=>$n, 'detalles'=>$nd]);
}

public function datosPagoMenu($id){
  $n = nota::where('id', $id)->first();
  $suma=$n->restante;
  return view ('notas.datosPago',['idn'=>$id,'actual'=>$suma]);
}

}
