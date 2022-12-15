<x-layouts.appCreacion title="Nueva nota" meta-description="Nueva nota">
<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">DETALLES DE NOTA</h1>
<div class="max-w-xl px-20 py-0 mx-auto bg-white ">
<table class="border-collapse border border-slate-400 ...">
  <thead>
    <tr>
      <th class="border border-slate-300 ...">Cantidad</th>
      <th class="border border-slate-300 ...">Elemento</th>
      <th class="border border-slate-300 ...">Servicio</th>
      <th class="border border-slate-300 ...">Observaciones</th>
      <th class="border border-slate-300 ...">Subtotal</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($detalles as $detalle)
    <tr>
      <td class="border border-slate-300 ...">{{$detalle->cantidad}}</td>
      <td class="border border-slate-300 ...">{{$detalle->idArticulo}}</td>
            <td class="border border-slate-300 ...">{{$detalle->idServicio}}</td>
      <td class="border border-slate-300 ...">{{$detalle->descripcion}}</td>
      <td class="border border-slate-300 ...">{{$detalle->subtotal}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
 </div>

<div class="flex items-center justify-between mt-3">
<form class="max-w-xl px-8 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('notas.cancelarNota',$idr)}}" method="POST">
	@csrf @method('DELETE')
    <input id="idNota" name="idNota" type="hidden"  value={{$idr}}>
    		<div class="flex items-center justify-between mt-2">
            <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Cancelar nota</button>
        </div>
</form>
            <form class="max-w-xl px-8 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('notas.addDetalle',$idr)}}" method="POST">
	@csrf
    <input id="idNota" name="idNota" type="hidden"  value={{$idr}}>
    		<div class="flex items-center justify-between mt-2">
            <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Agregar</button>
        </div>
</form>
            <form class="max-w-xl px-8 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('notas.datosPago')}}" method="POST">
	@csrf @method('PATCH')
    <input id="idNota" name="idNota" type="hidden"  value={{$idr}}>
    		<div class="flex items-center justify-between mt-2">
            <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Continuar</button>
        </div>
</form>
</div>
</x-layouts.app>

