<x-layouts.appCreacion title="Datos Entrega" meta-description="datos entrega">
<p>Datos de entrega</p>
<a href="{{route('notas.store')}}">Registrar cliente</a>
<form action="{{route('notas.updateCreate')}}" method="POST">
	@csrf @method('PATCH')
    <input id="idNota" name="idNota" type="hidden"  value={{$idNota}}>
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
<a href="{{route('welcome')}}">Regresar</a>
</x-layouts.app>