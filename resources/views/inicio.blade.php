<x-layouts.app title="Inicio" meta-description="Inicio">
<form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('notas.search')}}" method="POST">
	@csrf
	<label>
        Nota:
		<input type="text" name="id">
				<br>
						@error('id')
		<small style="color: red">{{$message}}</small>
		@enderror
	</label>
	<div class="flex items-center justify-between mt-4">
            <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Buscar</button>
    </div>
</form>
</x-layouts.app>
