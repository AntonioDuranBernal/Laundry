<x-layouts.appCreacion title="Datos de pago" meta-description="Datos de pago">
<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">DATOS DE PAGO</h1>
<p class="max-w-xl px-8 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800">Total a pagar: {{$actual}}</p>
<form class="max-w-xl px-8 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800"  action="{{route('notas.storepago')}}" method="POST">
	@csrf
	<input id="idNota" name="idNota" type="hidden"  value={{$idn}}>
	<label>
        Pago:
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
	    	<a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{route('welcome')}}">Regresar</a>
            <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Guardar</button>
            </div>
</form>
<form class="max-w-xl px-4 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('notas.cancelarNota',$idn)}}" method="POST">
	@csrf @method('DELETE')
    <input id="idNota" name="idNota" type="hidden"  value={{$idn}}>
        <button class="inline-flex items-center px-2 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Cancelar nota</button>
</form>
</x-layouts.app>