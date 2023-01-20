    <x-layouts.appCreacion title="Bienvenida" meta-description="WELCOME">

    <header class="px-6 py-4 space-y-2 text-center">

      @guest
      <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-900 focus:outline-none focus:border-sky-900 focus:shadow-outline-sky" href="{{route('login')}}">Login</a>
      <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-900 focus:outline-none focus:border-sky-900 focus:shadow-outline-sky" href="{{route('registro')}}">Registro</a>
      @else
      <div class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800">
      @auth
      <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-900 focus:outline-none focus:border-sky-900 focus:shadow-outline-sky" href="{{route('inicio')}}">Sistema Interno</a>
      @endauth
    </div>
    @endguest
</header>
</x-layouts.appCreacion>