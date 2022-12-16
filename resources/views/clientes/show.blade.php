<x-layouts.app :title="$cliente->id" meta-description="registro cliente">
<div class=" grid grid-cols-1 divide-y my-4 max-w-xl px-4 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800">
	<div class="py-4 grid grid-cols-1">
		<h1>Nombre: {{$cliente->nombre}}</h1>
		<p>Número de cliente: {{$cliente->id}}</p>
		<p>Celular: {{$cliente->celular}}</p>
	</div>
</div>
<div class="max-w-xl px-4 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800">
	    <div class="flex items-center justify-between mt-2">
	<a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" href="{{route('clientes.inicioClientes')}}">Regresar</a>

	<a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" href="{{route('clientes.inicioClientes')}}">Editar</a>

    <form action="{{route('clientes.eliminarCliente',$cliente->id)}}" method="POST">
	@csrf @method('DELETE')
	<input id="id" name="id" type="hidden"  value={{$cliente->id}}>
            <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Eliminar</button>
    </form>
</div>
</div>
</x-layouts.app>