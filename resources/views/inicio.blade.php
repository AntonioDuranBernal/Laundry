<x-layouts.app title="Inicio" meta-description="Inicio">
<h1>INICIO</h1>
<form action="{{route('notas.search')}}" method="POST">
	@csrf
	<label>
        Nota:
		<input type="text" name="id">
				<br>
						@error('id')
		<small style="color: red">{{$message}}</small>
		@enderror
	</label>
	<button type="submit">Buscar</button>
</form>
</x-layouts.app>