<x-layouts.app title="Historial" meta-description="Historial">
	<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">HISTORIAL DE PAGO FOLIO {{$idNota}}</h1>
	<div class=" grid grid-cols-1 divide-y my-4 max-w-xl px-4 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800">
		<table class="border-collapse border border-slate-400 ...">
			<thead>
				<tr>
					<th class="border border-slate-300 ...">Importe</th>
					<th class="border border-slate-300 ...">Restante</th>
					<th class="border border-slate-300 ...">Fecha</th>
					<th class="border border-slate-300 ...">Usuario</th>
				</tr>
			</thead>
			<tbody>
				@foreach($hitorial as $historia)
				<tr>
					<td class="border border-slate-300 ...">{{$historia->importe}}</td>
					<td class="border border-slate-300 ...">{{$historia->restante}}</td>
					<td class="border border-slate-300 ...">{{$historia->created_at}}</td>
					<td class="border border-slate-300 ...">{{$historia->idUsuarioSistema}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<form class="max-w-xl px-8 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('notas.registrarPago')}}" method="POST">
			@csrf @method('PATCH')
			<div class="space-y-4">
				<input id="idNota" name="idNota" type="hidden"  value={{$idNota}}>
				<label class="flex flex-col">
					<span class="font-serif text-slate-800 dark:text-slate-400">Pago</span>
					<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="importe" autofocus="autofocus" value="0">
					@error('importe')
					<small class="font-bold text-red-500/80">{{$message}}</small>
					@enderror
				</label>
				<label class="flex flex-col">
					<span class="font-serif text-slate-800 dark:text-slate-400">Cantidad entregada</span>
					<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="importeentregado" value="0">
					@error('importeentregado')
					<small class="font-bold text-red-500/80">{{$message}}</small>
					@enderror
				</label>
				<div class="flex items-center justify-between mt-4">
					<a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" href="{{route('notas.show',$idNota)}}">Regresar</a>
					<button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Registrar pago</button>
				</div>
			</form>
      </div>
		</x-layouts.app>