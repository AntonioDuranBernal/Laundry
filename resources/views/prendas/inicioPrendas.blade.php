<x-layouts.app title="Prendas" meta-description="prendas">
	<div  class="flex flex-wrap">
		<div class="w-full sm:w-4/5 md:w-4/5 lg:w-7/8 p-4 mb-1">
			<form class="rounded" action="{{route('prendas.show')}}" method="POST">
				@csrf
				<label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar</label>
				<div class="relative">
					<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
						<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
					</div>
					<input type="search" id="default-search" class="block w-full p-6 pl-10 text-bg text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Número de prenda" autofocus="autofocus" required type="text" name="id" id="id">
					<button id="buscarprenda" type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Buscar</button>
				</div>
			</form>
		</div>
		<div class="w-full md:w-1/5 lg:w-1/5 xl:w-1/8 p-4 mb-1">
			<a class="inline-flex items-center px-12 py-7 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500"
			href="{{route('prenda.nuevo')}}">Agregar nuevo</a>
		</div>
	<div class="w-full sm:w-4/5 md:w-4/5 lg:w-7/8 p-4 mb-1">
		<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
			<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
				<tr>
					<th scope="col" class="px-6 py-3">
						Nombre
					</th>
					<th scope="col" class="px-6 py-3">
						Servicio
					</th>
					<th scope="col" class="px-6 py-3">
						Costo
					</th>
					<th scope="col" class="px-6 py-3">
						Descripción
					</th>
					<th scope="col" class="px-6 py-3">
						<span class="sr-only">Opción</span>
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($elementos as $elemento)
				<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
					<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
						{{$elemento->nombre}}
					</th>
					<td class="px-6 py-4">
						{{$elemento->servicio}}
					</td>
					<td class="px-6 py-4">
						{{$elemento->costo}}
					</td>
					<td class="px-6 py-4">
						{{$elemento->descripcion}}
					</td>
					<td class="px-6 py-4 text-right">
						<a href="{{route('prendas.ver',$elemento->id)}}">Ver</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	</div>
</x-layouts.app>