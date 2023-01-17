<x-layouts.appCreacion title="Agregar detalles" meta-description="Detalles">
	<h1 class="my-4 font-serif text-3xl text-center text-sky-800 dark:text-sky-500">Detalles de nota</h1>
	<form flex-grow class="cpx-4 bg-white rounded shadow dark:bg-slate-800" action="{{route('notas.storeDetallesNota')}}" method="POST">
		@csrf
		<div class="mb-10 space-y-4 px-20 md:flex-none ">
			<input id="idNota" name="idNota" type="hidden"  value={{$idr}}>
			<label class="flex flex-col">
				<span class="font-serif text-slate-800 dark:text-slate-400">Servicio</span>
				<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" autofocus="autofocus" type="text" name="idServicio"value="{{old('idServicio')}}">
				@error('idServicio')
				<small class="font-bold text-red-500/80">{{$message}}</small>
				@enderror
			</label>
			<label class="flex flex-col">
				<span class="font-serif text-slate-800 dark:text-slate-400">Elemento</span>
				<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="idElemento"value="{{old('idElemento')}}">
				@error('idElemento')
				<small class="font-bold text-red-500/80">{{$message}}</small>
				@enderror
			</label>
			<input id="costo" name="costo" type="hidden"  value="12345">
			<label class="flex flex-col">
				<span class="font-serif text-slate-800 dark:text-slate-400">Cantidad</span>
				<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="cantidad"value="{{old('cantidad')}}">
				@error('cantidad')
				<small class="font-bold text-red-500/80">{{$message}}</small>
				@enderror
			</label>
			<label class="flex flex-col">
				<span class="font-serif text-slate-800 dark:text-slate-400">Descripción</span>
				<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="descripcion" value="{{old('descripcion')}}">
				@error('descripcion')
				<small class="font-bold text-red-500/80">{{$message}}</small>
				@enderror
			</label>
			<div class="flex items-center justify-between mt-2">
				<a class=" mb-8 text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{route('notas.indexdetallenotas',$idr)}}">Cancelar</a>
				<button class=" mb-8 inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Siguiente</button>
			</div>
		</div>
	</form>
	<br>


</x-layouts.app>