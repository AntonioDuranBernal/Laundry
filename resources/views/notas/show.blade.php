<x-layouts.appCreacion :title="$nota->id" :meta-description="$nota->id">
	<nav
	class="w-screen overflow-scroll bg-white border-b dark:bg-slate-900 border-slate-900/10 lg:px-8 dark:border-slate-300/10 lg:mx-0">
	<div class="px-4 mx-auto max-w-7xl sm:px-16 lg:px-20">
		<div class="relative flex items-center justify-between h-16">
			<div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
				<div class="flex items-center flex-shrink-0">
					<a href="#">
						<svg class="w-8 h-8 text-sky-500" fill="none" width="0" stroke="currentColor"
						viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 14l9-5-9-5-9 5 9 5z"></path>
						<path
						d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
					</path>
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
				</path>
			</svg>
		</a>
	</div>
	<div class="mx-auto">
		<div class="flex space-x-4">
			<!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
			<form action="{{route('notas.datosEntregaMenu')}}" method="POST">
				@csrf @method('PATCH')
				<input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
				<button type="submit">Datos de entrega</button>
			</form>
			<!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
			<form action="{{route('notas.datosPagoMenu',$nota->id)}}" method="POST">
				@csrf @method('PATCH')
				<input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
				<button type="submit">Detalles de servicio</button>
			</form>
			<!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
			<form action="{{route('notas.datosPagoMenu',$nota->id)}}" method="POST">
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
<div class=" grid grid-cols-1 divide-y my-4 max-w-xl px-4 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800">
<div>
<h1>Nota: {{$nota->id}}</h1>
<p>Cliente: {{$nota->idCliente}}</p>
<p>Fecha de entrega: {{date("d F Y", strtotime($nota->fechaEntrega))}}</p>
<p>Lugar de entrega: {{$nota->lugarEntrega}}</p>
</div>
<div>
@foreach($detalles as $detalle)
<h4>
	<p>
		Cantidad: {{$detalle->cantidad}}
		Elemento: {{$detalle->idArticulo}}
		Servicio: {{$detalle->idServicio}}
		Observaciones: {{$detalle->descripcion}}
		Subtotal: {{$detalle->subtotal}}
	</p>
</h4>
@endforeach
</div>
<div>
<p>Apuntes: {{$nota->apunte}}</p>
<p>Total inicial: {{$nota->total}}</p>
<p>Restante: {{$nota->restante}}</p>
</div>
</div>
<div class="my-4 max-w-xl px-4 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800">
	<a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" href="{{route('inicio')}}">Regresar</a>
	<form class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" action="{{route('notas.moverNota')}}" method="POST">
		@csrf @method('PATCH')
		<input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
		<button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Mover nota</button>
	</form>
	<form class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" action="{{route('notas.todolisto')}}" method="POST">
		@csrf @method('PATCH')
		<input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
		<button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Nota lista</button>
	</form>
	<a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" href="{{route('notas.historialPagos',$nota->id)}}">Pagos</a>
</div>
</x-layouts.app>