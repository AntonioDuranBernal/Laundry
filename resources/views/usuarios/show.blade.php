<x-layouts.app :title="$usuario->id" meta-description="mostrar usuario">
	<div class=" grid grid-cols-1 divide-y my-4 max-w-xl px-4 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800">
		<div class="py-4 grid grid-cols-1">
			<h1>Nombre: {{$usuario->nombre}}</h1>
			<h1>Apellidos: {{$usuario->apellidos}}</h1>
			<p>Celular: {{$usuario->celular}}</p>
			<p>Tipo usuario: {{$usuario->rol}}</p>
			<p>Sucursal: {{$usuario->sucursal}}</p>
		</div>
	</div>
	<div class="max-w-xl px-4 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800">
		<div class="flex items-center justify-between mt-2">
			<a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" href="{{route('usuarios.inicioUsuarios')}}">Regresar</a>
		</div>
	</div>
</x-layouts.app>