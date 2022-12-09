    <header class="px-6 py-4 space-y-2 text-center">
        <h1 class="font-serif text-3xl text-sky-600 dark:text-sky-500">Web Page Laundry</h1>

      @auth
      <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-900 focus:outline-none focus:border-sky-900 focus:shadow-outline-sky" href="{{route('inicio')}}">Sistema Interno</a>
      @endauth
      @guest
      <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-900 focus:outline-none focus:border-sky-900 focus:shadow-outline-sky" href="{{route('login')}}">Login</a>
      <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-900 focus:outline-none focus:border-sky-900 focus:shadow-outline-sky" href="{{route('registro')}}">Registro</a>
      @else
      <form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('logout')}}" method="POST">
        @csrf
        <div class="flex items-center justify-between mt-4">
            <a href="#" class="lg:px-3 py-2 text-sm font-medium rounded-md dark:text-white"
            onclick="this.closest('form').submit()">Cerrar sesión</a>
        </div>
    </form>
    @endguest





</header>