<x-layouts.appCreacion title="Nueva nota" meta-description="Nueva nota">
<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">DETALLES DE NOTA</h1>
<form action="{{route('notas.cancelarNota',$idr)}}" method="POST">
	@csrf @method('DELETE')
    <input id="idNota" name="idNota" type="hidden"  value={{$idr}}>
    <button type="submit">Cancelar nota</button>
</form>
<form action="{{route('notas.storeDetallesNota')}}" method="POST">
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
	<button type="submit">Agregar</button>
</form>
<br>
@foreach($detalles as $detalle)
<h2>
	   Cantidad: {{$detalle->cantidad}}
	   Elemento: {{$detalle->idArticulo}}
	   Servicio: {{$detalle->idServicio}}
	   Observaciones: {{$detalle->descripcion}}
	   Subtotal: {{$detalle->subtotal}}
</h2>
@endforeach
<br>
<form action="{{route('notas.datosPago')}}" method="POST">
	@csrf @method('PATCH')
    <input id="idNota" name="idNota" type="hidden"  value={{$idr}}>
    <button type="submit">Continuar</button>
</form>

</x-layouts.app>

