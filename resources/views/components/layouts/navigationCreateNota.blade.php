    <nav
    class="w-screen overflow-scroll bg-white border-b dark:bg-slate-900 border-slate-900/10 lg:px-8 dark:border-slate-300/10 lg:mx-0">
    <div class="px-4 mx-auto max-w-7xl sm:px-16 lg:px-20">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
                <div class="flex items-center flex-shrink-0">
                    <a href="#">
                        <svg class="w-8 h-8 text-sky-500" fill="none" width="0" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                </path>
            </svg>
        </a>
    </div>
    <div class="mx-auto">
        <div class="flex space-x-4">
            <!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
            <form action="{{route('notas.datosEntregaMenu')}}" method="POST" class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{request()->routeIs('notas.datosEntregaMenu') ? 'text-sky-600 dark:text-white' : 'text-black'}}">
                @csrf @method('PATCH')
                <input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
                <button type="submit">Datos de entrega</button>
            </form>
        <!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
        <form action="{{route('notas.datosPagoMenu',$nota->id)}}" method="POST" class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{request()->routeIs('notas.datosEntregaMenu') ? 'text-sky-600 dark:text-white' : 'text-black'}}">
            @csrf @method('PATCH')
            <input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
            <button type="submit">Detalles de servicio</button>
        </form>
        <!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
        <form action="{{route('notas.datosPagoMenu',$nota->id)}}" method="POST" class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{request()->routeIs('notas.datosEntregaMenu') ? 'text-sky-600 dark:text-white' : 'text-black'}}">
            @csrf @method('PATCH')
            <input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
            <button type="submit">Datos de pago</button>
        </form>
    </div>
</div>
</div>
</div>
</div>
</nav>