<x-layouts.app title="Detalles" meta-description="Detalles meta description">
    <header class="px-6 py-4 space-y-2 text-center">
        <h1 class="font-serif text-3xl text-center text-sky-600 dark:text-sky-500">LISTADO</h1>
    </header>
@foreach($notas as $nota)
<h2>
	 <a href="{{route('notas.show',$nota->id)}}">Nota:{{$nota->id}}</a>
</h2>
@endforeach
</x-layouts.app>