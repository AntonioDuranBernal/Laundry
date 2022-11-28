<x-layouts.appCreacion title="Nueva nota" meta-description="Nueva nota">
<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">DETALLES DE NOTA</h1>
<form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('notas.storeDetallesNota')}}" method="POST">
	@csrf
	<input id="idNota" name="idNota" type="hidden"  value={{$idr}}>
	<label>
        Servicio
		<input type="text" name="idServicio"value="{{old('idServicio')}}">
				<br>
						@error('idServicio')
		<small style="color: red">{{$message}}</small>
		@enderror
	</label>
	<label>
        Elemento
		<input type="text" name="idElemento"value="{{old('idElemento')}}">
				<br>
						@error('idElemento')
		<small style="color: red">{{$message}}</small>
		@enderror
	</label>
		<label>
        Costo unitario
		<input type="text" name="costo"value="{{old('costo')}}">
				<br>
						@error('costo')
		<small style="color: red">{{$message}}</small>
		@enderror
	</label>
		<label>
        Cantidad
		<input type="text" name="cantidad"value="{{old('cantidad')}}">
				<br>
						@error('cantidad')
		<small style="color: red">{{$message}}</small>
		@enderror
	</label>
		<label>
        Descripción
		<input type="text" name="descripcion" value="{{old('descripcion')}}">
		<br>
		@error('descripcion')
		<small style="color: red">{{$message}}</small>
		@enderror
	</label>
		<div class="flex items-center justify-between mt-2">
            <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Siguiente</button>
        </div>
</form>
<br>
<div class="max-w-xl px-8 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800">
@foreach($detalles as $detalle)
<h2>
	   Cantidad: {{$detalle->cantidad}}
	   Elemento: {{$detalle->idArticulo}}
	   Servicio: {{$detalle->idServicio}}
	   Observaciones: {{$detalle->descripcion}}
	   Subtotal: {{$detalle->subtotal}}
</h2>
@endforeach
 </div>
<div class="flex items-center justify-between mt-3">
<form class="max-w-xl px-8 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('notas.cancelarNota',$idr)}}" method="POST">
	@csrf @method('DELETE')
    <input id="idNota" name="idNota" type="hidden"  value={{$idr}}>
    		<div class="flex items-center justify-between mt-2">
            <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Cancelar nota</button>
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

