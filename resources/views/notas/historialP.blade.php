<x-layouts.app title="Historial" meta-description="Historial">
	<div flex-grow class="mt-1 grid grid-cols-1 divide-y max-w-xl py-2 mx-auto bg-white rounded shadow dark:bg-slate-800">
		<div class="md:flex-none ">
			<div class="inline-block min-w-full sm:px-8 lg:px-8">
				<div class="overflow-hidden">
					<div class="text-l font-medium text-sky-800 mb-2">
						<h1>Información de pago Nota {{$idNota}}</h1>
					</div>
					<table class="px-5 md:flex-none md:w-90 min-w-full text-center">
						<thead class="border-b bg-gray-800">
							<tr>
								<th scope="col" class="text-sm font-medium text-white px-6 py-4">
									Importe
								</th>
								<th scope="col" class="text-sm font-medium text-white px-6 py-4">
									Restante
								</th>
								<th scope="col" class="text-sm font-medium text-white px-6 py-4">
									Fecha
								</th>
								<th scope="col" class="text-sm font-medium text-white px-6 py-4">
									Usuario
								</th>
							</tr>
						</thead class="border-b">
						<tbody>
							@foreach($hitorial as $historia)
							<tr class="bg-white border-b">
								<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
									{{$historia->importe}}
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
									{{$historia->restante}}
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
									{{$historia->created_at}}
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
									{{$historia->idUsuarioSistema}}
								</td>
							</tr class="bg-white border-b">
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<form class="max-w-l px-8 py-1 " action="{{route('notas.registrarPago')}}" method="POST">
				@csrf @method('PATCH')
				<div class="px-8 py-1  space-y-4">
					<input id="idNota" name="idNota" type="hidden"  value={{$idNota}}>
					<label class="flex flex-col">
						<span class="font-serif text-slate-800 dark:text-slate-400">Pago</span>
						<input class="text-slate-800 dark:text-slate-400 focus:ring focus:ring-slate-300 focus:ring-opacity-50" type="text" name="importe" autofocus="autofocus" value="0">
						@error('importe')
						<small class="font-bold text-red-500/80">{{$message}}</small>
						@enderror
					</label>
					<label class="flex flex-col">
						<span class="font-serif text-slate-800 dark:text-slate-400">Cantidad entregada</span>
						<input class="text-slate-800 dark:text-slate-400 focus:ring focus:ring-slate-300 focus:ring-opacity-50 " type="text" name="importeentregado" value="0">
						@error('importeentregado')
						<small class="font-bold text-red-500/80">{{$message}}</small>
						@enderror
					</label>
					<div class="px-8 space-y-2">
						<div class="flex items-center justify-between mt-4">
							<a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" href="{{route('notas.show',$idNota)}}">Regresar</a>
							<button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Registrar pago</button>
						</div>
					</div>
				</div>
			</form>

		</div>
	</div>
	</x-layouts.app>