<x-layouts.app title="Ingresos" meta-description="Ingresos">
	<div flex-grow class="cpx-4 mb-6 bg-white rounded shadow dark:bg-slate-800"></div>
	<div  class="space-y-4 px-20 md:flex-none md:w-90">
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
  						{{$registro->importe}}
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
  	</div>
</x-layouts.app>

