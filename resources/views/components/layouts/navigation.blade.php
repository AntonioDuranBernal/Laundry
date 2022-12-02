@auth
<nav
class="w-screen overflow-scroll bg-white border-b dark:bg-slate-900 border-slate-900/10 lg:px-8 dark:border-slate-300/10 lg:mx-0">
<div class="px-4 mx-auto max-w-7xl sm:px-16 lg:px-20">
    <div class="relative flex items-center justify-between h-16">
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
            <a href="{{ route('notas.index')}}"
            class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{request()->routeIs('notas.index') ? 'text-sky-600 dark:text-white' : 'text-black'}}">
            Listado de notas
        </a>
    </div>
</div>
</div>
</div>
</div>
</nav>@endauth

