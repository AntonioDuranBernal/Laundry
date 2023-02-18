<x-layouts.appCreacion title="Datos de cliente" meta-description="Nuevo cliente">
	<h1 class="my-4 font-serif text-3xl text-center text-sky-800 dark:text-sky-500">Datos de cliente</h1>
	<form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800"  action="{{route('clientes.store')}}" method="POST">
		@csrf
		<div class="space-y-4">
			<div class="flex flex-col rounded-md shadow-sm border-slate-800 justify-center">
				<span class="font-serif text-slate-800 dark:text-slate-400">Nombre</span>
				<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="nombre">
				@error('nombre')
				<small class="font-bold text-red-500/80">{{$message}}</small>
				@enderror
			</div>
			<div class="flex flex-col rounded-md shadow-sm border-slate-800 justify-center">
				<span class="font-serif text-slate-800 dark:text-slate-400">Número de celular</span>
				<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="celular" >
				@error('celular')
				<small class="font-bold text-red-500/80">{{$message}}</small>
				@enderror
			</div>
	    <input id="idEmpresa" name="idEmpresa" type="hidden"  value={{$idEmpresa}}>
			<div class="flex items-center justify-between mt-2">
				<a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{route('inicio')}}">Cancelar</a>
				<button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Guardar</button>
			</div>
		</div>
	</form>
</x-layouts.app>