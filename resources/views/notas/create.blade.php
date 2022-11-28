<x-layouts.appCreacion title="Nueva nota" meta-description="Nueva nota">
<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Datos de entrega</h1>
<form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800"  action="{{route('notas.storeDatosCliente')}}" method="POST">
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
	<div class="flex items-center justify-between mt-2">
			<a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{route('inicio')}}">Regresar</a>

		    <a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{route('inicio')}}">Registrar cliente</a>

            <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Siguiente</button>
    </div>
 </form>
</x-layouts.app>