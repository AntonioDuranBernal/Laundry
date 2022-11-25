<x-layouts.appCreacion title="Nueva nota" meta-description="Nueva nota">
<p>Datos de entrega</p>
<a href="{{route('inicio')}}">Registrar cliente</a>
<form action="{{route('notas.storeDatosCliente')}}" method="POST">
	@csrf
	<label>
        Cliente
		<input type="text" name="idCliente" value="{{$idCliente}}">
				<br>
						@error('idCliente')
		<small style="color: red">{{$message}}</small>
		@enderror
	</label>
	<label>
        Fecha de entrega
		<input type="text" name="fechaEntrega" value="{{$fechaEntrega}}">
		<br>
		@error('fechaEntrega')
		<small style="color: red">{{$message}}</small>
		@enderror
	</label>
	<label>
        Lugar de entrega
		<input type="text" name="lugarEntrega" value="{{$lugarEntrega}}">
				<br>
						@error('lugarEntrega')
		<small style="color: red">{{$message}}</small>
		@enderror
	</label>
	<button type="submit">Siguiente</button>
</form>
<a href="{{route('inicio')}}">Regresar</a>
</x-layouts.app>