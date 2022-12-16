<x-layouts.app title="Servicios" meta-description="servicios">
	<div class="flex flex-wrap m-4">
		<div class="w-full sm:w-4/5 md:w-4/5 lg:w-7/8 p-4 mb-1">
			<form class="px-8 py-4 rounded" action="{{route('clientes.search')}}" method="POST">
				@csrf
				<label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar</label>
				<div class="relative">
					<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
						<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
					</div>
					<input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre de servicio" autofocus="autofocus" required type="text" name="id" id="id">
					<button id="buscarservicio" type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Buscar</button>
				</div>
			</form>
		</div>
		<div class="w-full md:w-1/5 lg:w-1/5 xl:w-1/8 p-4 mb-1">
			<form class="px-1 py-4 rounded" action="{{route('clientes.search')}}" method="POST">
				@csrf
				<button class="bg-blue-300 hover:bg-gray-400 text-gray-800 font-bold py-4 px-11 rounded inline-flex items-center" type="submit">Agregar</button>
			</form>
		</div>
	</div>
</x-layouts.app>