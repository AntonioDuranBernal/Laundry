<x-layouts.appCreacion :title="$nota->id" meta-description="Nota">
	<nav
	class="w-screen overflow-scroll bg-white border-b dark:bg-slate-900 border-slate-900/10 lg:px-8 dark:border-slate-300/10 lg:mx-0">
	<div class="px-4  mx-auto max-w-7xl sm:px-16 lg:px-20 ">
		<div class="relative flex items-center justify-between h-16">
			<div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
				<div class="mx-auto">
					<div class="flex space-x-4">
						<!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
						<form action="{{route('notas.datosEntregaMenu')}}" method="POST" class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{request()->routeIs('notas.datosEntregaMenu') ? 'text-sky-600 dark:text-white' : 'text-black'}}">
							@csrf @method('PATCH')
							<input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
							<button type="submit">Datos de entrega</button>
						</form>
						<!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
						<form action="{{route('notas.datosPagoMenu',$nota->id)}}" method="POST" class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{request()->routeIs('notas.datosEntregaMenu') ? 'text-sky-600 dark:text-white' : 'text-black'}}">
							@csrf @method('PATCH')
							<input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
							<button type="submit">Detalles de servicio</button>
						</form>
						<!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
						<form action="{{route('notas.datosPagoMenu',$nota->id)}}" method="POST" class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{request()->routeIs('notas.datosEntregaMenu') ? 'text-sky-600 dark:text-white' : 'text-black'}}">
							@csrf @method('PATCH')
							<input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
							<button type="submit">Datos de pago</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>
<div class="mt-3 max-w-3xl px-4 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800">
	<div class="py-1 inline-block min-w-full">
		<div class="overflow-hidden">
			<div class="py-4 grid grid-cols-2">
				<h1>Nota: {{$nota->id}}</h1>
				<p>Cliente: {{$nota->idCliente}}</p>
				<p>Fecha de entrega: {{date("d F Y", strtotime($nota->fechaEntrega))}}</p>
				<p>Lugar de entrega: {{$nota->lugarEntrega}}</p>
			</div>
			<table class="min-w-full text-center">
				<thead class="border-b bg-gray-800">
					<tr>
						<th scope="col" class="text-sm font-medium text-white px-6 py-4">
							Cantidad
						</th>
						<th scope="col" class="text-sm font-medium text-white px-6 py-4">
							Elemento
						</th>
						<th scope="col" class="text-sm font-medium text-white px-6 py-4">
							Servicio
						</th>
						<th scope="col" class="text-sm font-medium text-white px-6 py-4">
							Observaciones
						</th>
						<th scope="col" class="text-sm font-medium text-white px-6 py-4">
							Subtotal
						</th>
					</tr>
				</thead class="border-b">
				<tbody>
					@foreach($detalles as $detalles)
					<tr class="bg-white border-b">
						<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
							{{$detalles->cantidad}}
						</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
							{{$detalles->idArticulo}}
						</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
							{{$detalles->idServicio}}
						</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
							{{$detalles->descripcion}}
						</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
							$ {{$detalles->subtotal}}
						</td>
					</tr class="bg-white border-b">
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="py-4 grid grid-cols-1">
			<p>Apuntes: {{$nota->apunte}}</p>
			<p>Total inicial: {{$nota->total}}</p>
			<p>Restante: {{$nota->restante}}</p>
		</div>
	</div>
	<div class="mb-3 px-8 space-y-2">
		<div class="flex items-center justify-between mt-4">
			<a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" href="{{route('inicio')}}">Regresar</a>


			<form class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" <?php if ($nota->idEstado >= '15' | $nota->idEstado <= '26'){ ?> style="display:none;" <?php   } ?> action="{{route('notas.todolisto')}}" method="POST">
				@csrf @method('PATCH')
				<input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
				<button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Listo</button>
			</form>

			<form class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" <?php if ($nota->idEstado >= '16'){ ?> style="display:none;" <?php   } ?> action="{{route('notas.entregarNota')}}" method="POST">
				@csrf @method('PATCH')
				<input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
				<button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Entregar</button>
			</form>

			<form class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" action="{{route('notas.confirmado')}}" method="POST">
				@csrf
				<input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
				<button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Confirmar</button>
			</form>

			<a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" href="{{route('notas.historialPagos',$nota->id)}}">Pagos</a>
		</div>
	</div>
</div>
</x-layouts.app>