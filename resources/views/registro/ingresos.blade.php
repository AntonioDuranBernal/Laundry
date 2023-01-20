<x-layouts.app title="Ingresos" meta-description="Ingresos">
	<div flex-grow class="cpx-4 mb-6 bg-white rounded shadow dark:bg-slate-800"></div>
	<div  class="text-center space-y-4 px-20 md:flex-none md:w-90 ">

		<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
			<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
				<tr>
					<th scope="col" class="px-6 py-3">
						Nota
					</th>
					<th scope="col" class="px-6 py-3">
						Importe
					</th>
					<th scope="col" class="px-6 py-3">
						Usuario
					</th>
					<th scope="col" class="px-6 py-3">
						<span class="sr-only">Opción</span>
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($todos as $registro)
				<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
					<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
						{{$registro->idNota}}
					</th>
					<td class="px-6 py-4">
						$ {{$registro->importe}}
					</td>
					<td class="px-6 py-4">
						{{$registro->idUsuarioSistema}}
					</td>
					<td class="px-6 py-4 text-right">
						<a href="{{route('notas.historialPagos',$registro->idNota)}}">Detalles</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

        		<form class="max-w-xl px-8 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('archivo.entreFechas')}}" method="POST">
			@csrf
			<div class="px-8 py-1  space-y-4">
				<label class="flex flex-col">
					<span class="font-serif text-slate-800 dark:text-slate-400">Fecha inicio</span>
					<input class="text-slate-800 dark:text-slate-400 focus:ring focus:ring-slate-300 focus:ring-opacity-50" type="text" name="inicio" autofocus="autofocus">
					@error('inicio')
					<small class="font-bold text-red-500/80">{{$message}}</small>
					@enderror
				</label>
				<label class="flex flex-col">
					<span class="font-serif text-slate-800 dark:text-slate-400">Fecha fin</span>
					<input class="text-slate-800 dark:text-slate-400 focus:ring focus:ring-slate-300 focus:ring-opacity-50 " type="text" name="fin">
					@error('fin')
					<small class="font-bold text-red-500/80">{{$message}}</small>
					@enderror
				</label>
				<div class="px-8 space-y-2">
					<div class="flex items-center justify-between mt-4">
						<a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" href="{{route('notas.index')}}">Regresar</a>
						<button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Aplicar</button>
					</div>
				</div>
			</div>
		</form>


	</div>
</x-layouts.app>
