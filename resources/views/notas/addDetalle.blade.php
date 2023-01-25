<x-layouts.appCreacion title="Agregar detalles" meta-description="Detalles">
	<h1 class="my-4 font-serif text-3xl text-center text-sky-800 dark:text-sky-500">Detalles de nota</h1>
	<form flex-grow class="cpx-4 bg-white rounded shadow dark:bg-slate-800" action="{{route('notas.storeDetallesNota')}}" method="POST">
		@csrf
		<div class="mb-10 space-y-4 px-20 md:flex-none ">
			<input id="idNota" name="idNota" type="hidden"  value={{$idr}}>

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
					focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Ingresar servicio" type="text" autofocus="autofocus" name="idServicio">
					@foreach($servicios as $servicio)
					<option value="{{$servicio->id}}">{{$servicio->descripcion}}</option>
					@endforeach
				</select>
			</div>
		    </div>

		      <div class="rounded-md shadow-sm border-slate-800 justify-center">
                <span class="font-serif text-slate-800 dark:text-slate-400">Elemento</span>
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
					focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Ingresar " type="text" autofocus="autofocus" name="idElemento">
					@foreach($elementos as $elemento)
					<option value="{{$elemento->id}}">{{$elemento->nombre}} - {{$elemento->descripcion}}</option>
					@endforeach
				</select>
			</div>
		    </div>

		    <input id="costo" name="costo" type="hidden"  value="12345">

             <div class="rounded-md shadow-sm border-slate-800 justify-center">
                <span class="font-serif text-slate-800 dark:text-slate-400">Cantidad</span>
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
					focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Ingresar cantidad" type="text" autofocus="autofocus" name="cantidad">
					<option value="1" selected>1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
		    </div>

			<label class="flex flex-col">
				<span class="font-serif text-slate-800 dark:text-slate-400">Observaciones</span>
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