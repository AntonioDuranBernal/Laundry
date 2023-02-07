<x-layouts.appCreacion title="Nueva nota" meta-description="Nueva nota">
   <h1 class="my-4 font-serif text-3xl text-center text-sky-800 dark:text-sky-500">Detalles de nota</h1>
<div class="mt-3 max-w-3xl px-4 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800">
   <h1>Número de cliente: {{$idCliente}}</h1>
   <div class="py-1 inline-block min-w-full">
      <div class="overflow-hidden">
         <table class="min-w-full text-center">
            <thead class="border-b bg-gray-800">
               <tr>
                  <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                     Número de Nota
                  </th>
                  <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                     Fecha de entrega
                  </th>
                  <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                     Total
                  </th>
                  <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                     Restante
                  </th>
                  <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                     Apunte
                  </th>
                  <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  </th>
               </tr>
            </thead class="border-b">
            <tbody>
               @foreach($notas as $detalles)
               <tr class="bg-white border-b">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                     {{$detalles->id}}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                     {{$detalles->fechaEntrega}}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                     $ {{$detalles->total}}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                     $ {{$detalles->restante}}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                     {{$detalles->apunte}}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                     <a href="{{route('notas.show',$detalles->id)}}">Ver</a>
                  </td>
               </tr class="bg-white border-b">
               @endforeach
            </tbody>
         </table>
      </div>

   </div>
   <div class="mb-3 px-8 space-y-2">
      <div class="flex items-center justify-between mt-4">
         <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" href="{{route('clientes.inicioClientes')}}">Regresar</a>
      </div>
   </div>
</div>
</x-layouts.appCreacion>