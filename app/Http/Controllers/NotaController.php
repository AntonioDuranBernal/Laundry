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

    public function nuevanota(){
     date_default_timezone_set('America/Mexico_City');
     $fecha_actual = date("Y-m-d h:m:s");
     $stringDate = date("Y-m-d",strtotime($fecha_actual."+ 2 days"));
     return view('notas.create', ['fechaEntrega'=>$stringDate,'lugarEntrega'=>1,'idCliente'=>1]);
    }

    public function index(){
     $notas = nota::get();
     return view('notas.index', ['notas'=>$notas]);
    }

  public function datosPago(Request $request){
      $id = $request->input('idNota');
      $suma= DB::table('detalle_nota_servicios')->where('idNota',$id)->sum(\DB::raw('subtotal'));
      DB::table('notas')->where('id',$id)->update(['restante' => $suma]);
      DB::table('notas')->where('id',$id)->update(['total' => $suma]);
      return view ('notas.datosPago',['idn'=>$id,'actual'=>$suma]);
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
        ['idCliente'=> ['required','numeric'],
        'fechaEntrega'=> ['required','date_format:Y-m-d'],//H:i:s
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

     public function store(Request $request){
      $request->validate(
        ['idCliente'=> ['required','numeric'],
        'fechaEntrega'=> ['required','date_format:Y-m-d'],//H:i:s
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
      $nota->restante = null;
      $nota->save();

      $idn = nota::latest('id')->first();
      $idr = $idn->id;
      return to_route('notas.indexdetallenotas', $idr);
    }

    public function indexdetallenotas($idr){
     $detalles = DB::table('detalle_nota_servicios')->where('idNota', $idr)->get();
     return view('notas.createDetallesNota',['detalles'=>$detalles,'idr'=>$idr]);//,$idr
    }

 public function storeDetallesNota(Request $request){
      $request->validate(
        ['idServicio'=> ['required','numeric'], //mas de 0
        'costo'=> ['required','min:1'], //mas de 1 peso, max 6 digitos
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
      return to_route('notas.index')->with('status','Nota cancelada');
      }

  public function search(Request $request){
      $request->validate(
        ['id'=> ['required','numeric'],
      ]);
   $n = DB::table('notas')->where('id', $request->input('id'))->first();
   if(is_null($n)){
   return view('welcome');
   }
   $nd = DB::table('detalle_nota_servicios')->where('idNota', $request->input('id'))->get();
   return view ('notas.show',['nota'=>$n, 'detalles'=>$nd]);
   }

     public function todolisto(Request $request){
      DB::table('notas')->where('id', $request->input('idNota'))->update(['idEstado' => '5']);
      return to_route('notas.index')->with('status','Nota lista para entregar');
  }

      public function moverNota(Request $request){
      DB::table('notas')->where('id', $request->input('idNota'))->update(['idEstado' => '9']);
      return to_route('notas.index')->with('status','Moviendo nota');
  }

    public function historialPagos($id){
      $hp = DB::table('historial_pagos')->where('idNota',$id)->get();
      return view ('notas.historialP',['hitorial'=>$hp,'idNota'=>$id]);
  }


  public function registrarPago(Request $request){
      $request->validate(
       ['importe'=> ['required','integer'],//0 o mayor
      ]);

     $n = DB::table('notas')->where('id',$request->input('idNota'))->first();
     $idr = $n->id;
     if(is_null($n)){
     return to_route('notas.indexdetallenotas',$idr);
     }

     $totalr= $n->restante;
     $importe = $request->input('importe');
     $entregado = $request->input('importeentregado');
     $restante = $totalr-$importe;
     $cambio = $entregado-$importe;
     DB::table('notas')->where('id', $request->input('idNota'))->update(['restante' => $restante]);

     $historia= new historialPago;
     $historia->idNota = $request->input('idNota');
     $historia->idUsuarioSistema = $request->input('idNota');//POR MODIFICAR
     $historia->importe = $importe;
     $historia->restante = $restante;
     $historia->save();


     $hp = DB::table('historial_pagos')->where('idNota',$request->input('idNota'))->get();
     return view ('notas.historialP',['hitorial'=>$hp,'idNota'=>$idr]);
  }

    public function storepago(Request $request){
      $request->validate(
        ['importe'=> ['required','integer'],//0 o mayor
         'importeentregado'=> ['required','integer'],//
      ]);

     //$nota = nota::where('id', '=',$request->input('idNota'))->first();
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

     if ($totalrestante==$totalinicial){
        $restante = $totalinicial-$importe;
        DB::table('notas')->where('id', $idr)->update(['idEstado' => '2']);//PAGO COMPLETO CAMBIAR ESTADO
        DB::table('notas')->where('id', $idr)->update(['restante' => $restante]);
     }else{
        $restante = $totalrestante-$importe;
        DB::table('notas')->where('id', $idr)->update(['idEstado' => '2']);//PAGO COMPLETO CAMBIAR ESTADO
        DB::table('notas')->where('id', $idr)->update(['restante' => $restante]);
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
    }
  }

   public function show($id){
   $n = DB::table('notas')->where('id', $id)->first();
   $nd = DB::table('detalle_nota_servicios')->where('idNota', $id)->get();
   return view ('notas.show',['nota'=>$n, 'detalles'=>$nd]);
   }

  public function datosPagoMenu($id){
      $n = DB::table('notas')->where('id', $id)->first();
      $suma = $n->restante;
      return view ('notas.datosPago',['idn'=>$id,'actual'=>$suma]);
  }



}