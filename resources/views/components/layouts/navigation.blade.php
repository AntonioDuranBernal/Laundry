@auth
<nav
class="w-screen bg-white lg:px-8 dark:border-slate-300/10 lg:mx-0">
<div class="px-4 mx-auto max-w-7xl sm:px-15 lg:px-20 ">
    <div class="relative flex items-center justify-between h-20">
        <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
            <div class="flex items-center flex-shrink-0">
                <div class="text-black">{{Auth::user()->name}}</div>
            </div>
            <div class="mx-auto">
                <div class="flex space-x-4">
                    <!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
                    <a href="{{route('inicio')}}"
                    class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{request()->routeIs('inicio') ? 'text-sky-600 dark:text-white' : 'text-black'}}">
                    Inicio
                </a>
                <!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
                <a href="{{route('notas.nuevanota')}}"
                class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{request()->routeIs('notas.nuevanota.*') ? 'text-sky-600 dark:text-white' : 'text-black'}}">
                Nueva nota
            </a>
                    <!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
            <a href="{{ route('clientes.inicioClientes')}}"
            class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{request()->routeIs('clientes.inicioClientes') ? 'text-sky-600 dark:text-white' : 'text-black'}}">
            Clientes
        </a>
                    <!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
            <a href="{{ route('servicios.inicioServicios')}}"
            class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{request()->routeIs('servicios.inicioServicios') ? 'text-sky-600 dark:text-white' : 'text-black'}}">
            Servicios
        </a>
                    <!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
            <a href="{{ route('prendas.inicioPrendas')}}"
            class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{request()->routeIs('prendas.inicioPrendas') ? 'text-sky-600 dark:text-white' : 'text-black'}}">
            Prendas
        </a>
               <!-- Active: 'text-sky-600 dark:text-white', Inactive 'text-slate-400' -->
            <a href="{{ route('notas.index')}}"
            class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{request()->routeIs('notas.index') ? 'text-sky-600 dark:text-white' : 'text-black'}}">
            Opciones
        </a>
    </div>
</div>
</div>
</div>
</div>
</nav>@endauth

