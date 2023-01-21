<x-layouts.appCreacion title="Datos de prenda" meta-description="Nueva prenda">
	<h1 class="my-4 font-serif text-3xl text-center text-sky-800 dark:text-sky-500">Datos de prenda</h1>
	<form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800"  action="{{route('prendas.store')}}" method="POST">
		@csrf
		<div class="space-y-4">
			<div class="flex flex-col rounded-md shadow-sm border-slate-800 justify-center">
				<span class="font-serif text-slate-800 dark:text-slate-400">Nombre</span>
				<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="nombre">
				@error('nombre')
				<small class="font-bold text-red-500/80">{{$message}}</small>
				@enderror
			</div>

		      <div class="rounded-md shadow-sm border-slate-800 justify-center">
                <span class="font-serif text-slate-800 dark:text-slate-400">Servicio</span>
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
					focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Ingresar " type="text" autofocus="autofocus" name="servicio">
					@foreach($servicios as $servicio)
					<option value="{{$servicio->id}}">{{$servicio->descripcion}}</option>
					@endforeach
				</select>
			</div>
		    </div>

		<div class="flex flex-col rounded-md shadow-sm border-slate-800 justify-center">
			<span class="font-serif text-slate-800 dark:text-slate-400">Costo</span>
			<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="costo">
			@error('costo')
			<small class="font-bold text-red-500/80">{{$message}}</small>
			@enderror
		</div>

			<div class="flex flex-col rounded-md shadow-sm border-slate-800 justify-center">
				<span class="font-serif text-slate-800 dark:text-slate-400">Descripción</span>
				<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="descripcion">
				@error('descripcion')
				<small class="font-bold text-red-500/80">{{$message}}</small>
				@enderror
			</div>

			<input id="id" name="idEmpresa" type="hidden"  value='12345'>

		<div class="flex items-center justify-between mt-2">
			<a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{route('prendas.inicioPrendas')}}">Cancelar</a>
			<button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Guardar</button>
		</div>

	</div>
</form>
</x-layouts.app>