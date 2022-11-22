<x-layouts.app title="Historial" meta-description="Historial">
<p>Historial de pagos</p>
<br>
<p>Nota: {{$idNota}}</p>
@foreach($hitorial as $historia)
<h2>
	   Importe: {{$historia->importe}}
	   Restante: {{$historia->restante}}
	   Fecha: {{$historia->created_at}}
	   Usuario que atendio: {{$historia->idUsuarioSistema}}
</h2>
@endforeach
<br>
<form action="{{route('notas.registrarPago')}}" method="POST">
	@csrf @method('PATCH')
	<input id="idNota" name="idNota" type="hidden"  value={{$historia->idNota}}>
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
	<button type="submit">Registrar pago</button>
</form>
<a href="{{route('notas.index')}}">Inicio</a>
<br>
</x-layouts.app>