<x-layouts.appCreacion title="Nueva nota" meta-description="Nueva nota">
<p>Datos de entrega</p>
<a href="{{route('notas.store')}}">Registrar cliente</a>
<form action="{{route('notas.store')}}" method="POST">
	@csrf
	<label>
        Cliente
		<input type="text" name="idCliente" value="1" value="{{old('idCliente')}}">
				<br>
						@error('idCliente')
		<small style="color: red">{{$message}}</small>
		@enderror
	</label>
	<label>
        Fecha de entrega
		<input type="text" name="fechaEntrega" value="{{$fecha}}">
		<br>
		@error('fechaEntrega')
		<small style="color: red">{{$message}}</small>
		@enderror
	</label>
	<label>
        Lugar de entrega
		<input type="text" name="lugarEntrega" value="1" value="{{old('lugarEntrega')}}">
				<br>
						@error('lugarEntrega')
		<small style="color: red">{{$message}}</small>
		@enderror
	</label>
	<button type="submit">Siguiente</button>
</form>
<a href="{{route('welcome')}}">Regresar</a>
</x-layouts.app>