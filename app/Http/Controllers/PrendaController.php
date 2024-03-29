<?php

namespace App\Http\Controllers;
use App\Models\Prenda;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\usersInformation;
class PrendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicioPrendas(){
        $usuario = usersInformation::where('idUser',auth()->user()->id)->first();
        $idempresa = $usuario->idEmpresa;
        $elementos = Prenda::where('idEmpresa',$idempresa)->get();
        return view('prendas.inicioPrendas', ['elementos'=>$elementos]);
    }

    public function nuevo(){
        $usuario = usersInformation::where('idUser',auth()->user()->id)->first();
        $idempresa = $usuario->idEmpresa;
        $servicios = Servicio::where('idEmpresa',$idempresa)->get();
      return view('prendas.nuevo',['servicios'=>$servicios,'idEmpresa'=>$idempresa]);
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                //'servicio'=> ['required','min_digits:1','string'],
                'costo'=> ['required','min_digits:1','numeric'],
                'nombre'=> ['required','string'],
                'descripcion'=> ['required','string'],
                'idEmpresa'=> ['required','min_digits:1','numeric'],
            ]);

        $prenda= new prenda;
        $prenda->nombre = $request->input('nombre');
        $prenda->costo = $request->input('costo');
        $prenda->descripcion = $request->input('descripcion');
        $prenda->servicio = $request->input('servicio');
        $prenda->idEmpresa = $request->input('idEmpresa');
        $serv = Servicio::where('descripcion',$request->input('servicio'))->first();
        $prenda->idservicio = $serv->id;
        $prenda->save();

        $idp = prenda::latest('id')->first();
        $idr = $idp->id;
        session()->flash('status',"ID Prenda: $idr");
        return to_route('prendas.inicioPrendas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prenda  $prenda
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request){
        $request->validate(
          ['id'=> ['required','numeric'],
      ]);
        $n = prenda::find($request->input('id'));
        if(is_null($n)){
            return to_route('prendas.inicioPrendas')->with('status','Prenda no encontrada.');
        }
        return view ('prendas.show',['prenda' => $n]);
    }

    public function ver($idr){
       $n = prenda::find($idr);
     return view('prendas.show',['prenda'=>$n]);//,$idr
 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prenda  $prenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Prenda $prenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prenda  $prenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prenda $prenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prenda  $prenda
     * @return \Illuminate\Http\Response
     */

    public function destroy(Prenda $id){
        $id->delete();
        return to_route('prendas.inicioPrendas')->with('status','Prenda eliminada.');
    }

}
