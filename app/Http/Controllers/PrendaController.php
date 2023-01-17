<?php

namespace App\Http\Controllers;
use App\Models\Prenda;
use Illuminate\Http\Request;

class PrendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'servicio'=> ['required','min_digits:1','numeric'],
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
