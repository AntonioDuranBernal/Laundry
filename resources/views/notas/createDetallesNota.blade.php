

<x-layouts.appCreacion title="Nueva nota" meta-description="Nueva nota">
   <h1 class="my-4 font-serif text-3xl text-center text-sky-800 dark:text-sky-500">Detalles de nota</h1>
<div class="mt-3 max-w-3xl px-4 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800">
  <div class="py-1 inline-block min-w-full">
    <div class="overflow-hidden">
      <table class="min-w-full text-center">
          <thead class="border-b bg-gray-800">
            <tr>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
              Cantidad
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
              Elemento
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
              Servicio
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
              Observaciones
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
              Subtotal
              </th>
            </tr>
          </thead class="border-b">
          <tbody>
            @foreach($detalles as $detalles)
            <tr class="bg-white border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{$detalles->cantidad}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{$detalles->idArticulo}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                 {{$detalles->idServicio}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{$detalles->descripcion}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{$detalles->subtotal}}
              </td>
            </tr class="bg-white border-b">
             @endforeach
          </tbody>
        </table>
    </div>
  </div><br><br>
  <div class="mb-1 px-8 space-y-2">
    <div class="flex items-center justify-between mt-4">
  <form class="mb-2 max-w-xl px-8 py-1 mx-auto" action="{{route('notas.cancelarNota',$idr)}}" method="POST">
   @csrf @method('DELETE')
   <input id="idNota" name="idNota" type="hidden"  value={{$idr}}>
   <div class="flex items-center justify-between mt-2">
    <button class="mb-4 text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" type="submit">Cancelar nota</button>
  </div>
</form>
<form class="mb-2 max-w-xl px-8 py-1 mx-auto" action="{{route('notas.addDetalle',$idr)}}" method="POST">
  @csrf
  <input id="idNota" name="idNota" type="hidden"  value={{$idr}}>
  <div class="flex items-center justify-between mt-2">
    <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Agregar</button>
  </div>
</form>
<form class="mb-2 max-w-xl px-8 py-1 mx-auto" action="{{route('notas.datosPago')}}" method="POST">
  @csrf @method('PATCH')
  <input id="idNota" name="idNota" type="hidden"  value={{$idr}}>
  <div class="flex items-center justify-between mt-2">
    <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Continuar</button>
  </div>
</form>
    </div>
  </div>
</div>
</x-layouts.appCreacion>