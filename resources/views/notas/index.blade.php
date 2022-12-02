<x-layouts.app title="Detalles" meta-description="Detalles meta description">
    <header class="px-6 py-4 space-y-2 text-center">
        <h1 class="font-serif text-3xl text-center text-sky-600 dark:text-sky-500">LISTADO</h1>
    </header>
@foreach($notas as $nota)
<h2 class="max-w-xl px-8 py-4 mx-auto">
	 <a href="{{route('notas.show',$nota->id)}}">Nota:{{$nota->id}}</a>
</h2>
@endforeach
<br>
@auth
        <form class="max-w-xl px-8 py-4 mx-auto" action="{{route('logout')}}" method="POST">
            @csrf
            <div class="flex items-center justify-between mt-4">
            <a href="#" class="lg:px-3 py-2 text-sm font-medium rounded-md dark:text-white"
            onclick="this.closest('form').submit()">Cerrar sesión</a>
            </div>
        </form>

@endauth
</x-layouts.app>