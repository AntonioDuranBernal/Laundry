<x-layouts.appCreacion title="Nueva nota" meta-description="Nueva nota">
<div  class="mt-1 grid grid-cols-1 divide-y max-w-xl py-2 mx-auto bg-white">
	<div class="md:flex-none ">
	<h1 class="my-2 font-serif text-3xl text-center text-sky-800 dark:text-sky-500">Datos de entrega</h1>

	<form flex-grow class="cpx-4 mb-2 bg-white rounded shadow dark:bg-slate-800"  action="{{route('notas.storeDatosCliente')}}" method="POST">
		@csrf
		<div class="space-y-4 px-20 md:flex-none md:w-90 ">
			<div class="rounded-md shadow-sm border-slate-800 justify-center">
				<span class="font-serif text-slate-800 dark:text-slate-400">Celular cliente</span>
				<div class="flex flex-col">
					<select class="form-select appearance-none
					block
					w-full
					px-3
					py-1.5
					text-base
					font-normal
					text-gray-700
					bg-white bg-clip-padding bg-no-repeat
					border border-solid border-gray-300
					rounded
					transition
					ease-in-out
					m-0
					focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" type="text" name="idCliente" autofocus="autofocus">
					<option value="1" selected>General</option>
					@foreach($clientes as $cliente)
					<option value="{{$cliente->id}}">{{$cliente->celular}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<label class="flex flex-col">
			<span class="font-serif text-slate-800 dark:text-slate-400">Fecha de entrega</span>
			<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="fechaEntrega" value="{{$fechaEntrega}}">
			@error('fechaEntrega')
			<small class="font-bold text-red-500/80">{{$message}}</small>
			@enderror
		</label>

		<div class="flex flex-col rounded-md shadow-sm border-slate-800 justify-center">
			<span class="font-serif text-slate-800 dark:text-slate-400">Lugar de entrega</span>
			<div class="flex flex-col">
				<select class="form-select appearance-none
				block
				w-full
				px-3
				py-1.5
				text-base
				font-normal
				text-gray-700
				bg-white bg-clip-padding bg-no-repeat
				border border-solid border-gray-300
				rounded
				transition
				ease-in-out
				m-0
				focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example"  type="text" name="lugarEntrega" value="{{$lugarEntrega}}">
				<option selected value="1">Sucursal Brenamiel</option>
				<option value="2">Sucursal Prueblo Nuevo</option>
				<option value="3">Sucursal Centro</option>
				<option value="4">Sucursal Etla</option>
			</select>
		</div>
	</div>
	<div class="flex items-center justify-between mt-2">
		<a class="mb-4 text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{route('inicio')}}">Cancelar</a>

		<a class="mb-4 text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{route('clientes.nuevo')}}">Registrar cliente</a>

		<button class="mb-4 inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Siguiente</button>
	</div>
</div>
</form>
</div>
</div>
</x-layouts.appCreacion>


