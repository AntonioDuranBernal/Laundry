<x-layouts.app title="Detalles" meta-description="Detalles meta description">

<h1>Detalles</h1>
@foreach($notas as $nota)
<h2>
	<a href="{{route('notas.show',$nota->id)}}">
		Nota:{{$nota->id}}</a>
</h2>
@endforeach
</x-layouts.app>