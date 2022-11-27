<x-layouts.appCreacion title="Datos de pago" meta-description="Datos de pago">
<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">DATOS DE PAGO</h1>
<p>Total a pagar: {{$actual}}</p>
<form action="{{route('notas.cancelarNota',$idn)}}" method="POST">
	@csrf @method('DELETE')
    <input id="idNota" name="idNota" type="hidden"  value={{$idn}}>
    <button type="submit">Cancelar nota</button>
</form>
<form action="{{route('notas.storepago')}}" method="POST">
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
	<button type="submit">Guardar</button>
</form>
<a href="{{route('welcome')}}">Regresar</a>
</x-layouts.app>