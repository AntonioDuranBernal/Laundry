<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
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
    public function store(Request $request){
     $request->validate(
         [   'idEmpresa'=> ['required','digits:5','numeric'],
         'descripcion'=> ['required','string']
     ]);
     $servicio = new Servicio;
     $servicio->idEmpresa = $request->input('idEmpresa');
     $servicio->descripcion = $request->input('descripcion');
     $servicio->save();


     $idc = servicio::latest('id')->first();
     $idr = $idc->id;
     session()->flash('status',"ID servicio: $idr");
     return to_route('servicios.inicioServicios');

 }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request){
    $request->validate(
      ['id'=> ['required','numeric'],
    ]);
    $n = Servicio::find($request->input('id'));
    if(is_null($n)){
    return to_route('servicios.inicioServicios')->with('status','Servicio no encontrado.');

     }
     return view ('servicios.show',['servicio' => $n]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
