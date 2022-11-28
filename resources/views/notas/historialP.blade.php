<x-layouts.app title="Historial" meta-description="Historial">
	<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">HISTORIAL DE PAGO</h1>
<div class=" grid grid-cols-1 divide-y my-4 max-w-xl px-4 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800">
<div>
	<p>Nota: {{$idNota}}</p>
	@foreach($hitorial as $historia)
	<h2>
		Importe: {{$historia->importe}}
		Restante: {{$historia->restante}}
		Fecha: {{$historia->created_at}}
		Usuario que atendio: {{$historia->idUsuarioSistema}}
	</h2>
	@endforeach
</div>
<br>
	<form class="max-w-xl px-8 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('notas.registrarPago')}}" method="POST">
		@csrf @method('PATCH')
		<input id="idNota" name="idNota" type="hidden"  value={{$idNota}}>
		<label>
			Importe:
			<input type="text" name="importe" value="0">
			<br>
			@error('importe')
			<small style="color: red">{{$message}}</small>
			@enderror
		</label>
		<label>
			Cantidad entregada:
			<input type="text" name="importeentregado" value="0">
			<br>
			@error('importeentregado')
			<small style="color: red">{{$message}}</small>
			@enderror
		</label>
		<div class="flex items-center justify-between mt-4">
			<a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" href="{{route('notas.show',$idNota)}}">Regresar</a>
			<button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Registrar pago</button>
		</div>
	</form>

</x-layouts.app>