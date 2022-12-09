<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lava Express</title>
  <meta name="description" content="{{ $metaDescription ?? 'Default meta decription' }}" />
  @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body><br><br><br>
  <div class=" rounded shadow max-w-xl px-8 py-4 mx-auto bg-white dark:bg-slate-800">
    <div>
      <div class="py-3 px-6 border-b border-gray-300">
       Página de error.
     </div>
     <div class="p-6">
      <h5 class="text-gray-900 text-xl font-medium mb-2">@yield('title')</h5>
      <p class="text-gray-700 text-base mb-4">
        @yield('message')
      </p>
      <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-900 focus:outline-none focus:border-sky-900 focus:shadow-outline-sky" href="{{route('inicio')}}">Ir a inicio</a>
    </div>
  </div>
</div>
</body>
</html>
