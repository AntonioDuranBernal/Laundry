<x-layouts.appCreacion :title="$nota->id" :meta-description="$nota->id">
<br>

<form action="{{route('notas.datosEntregaMenu')}}" method="POST">
	@csrf @method('PATCH')
    <input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
    <button type="submit">Datos de entrega</button>
</form>

<form action="{{route('notas.datosPagoMenu',$nota->id)}}" method="POST">
	@csrf @method('PATCH')
    <input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
    <button type="submit">Detalles de servicio</button>
</form>

<form action="{{route('notas.datosPagoMenu',$nota->id)}}" method="POST">
	@csrf @method('PATCH')
    <input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
    <button type="submit">Datos de pago</button>
</form>

<br>
<h1>Nota: {{$nota->id}}</h1>
<p>Cliente: {{$nota->idCliente}}</p>
<p>Fecha de entrega: {{date("d F Y", strtotime($nota->fechaEntrega))}}</p>
<p>Lugar de entrega: {{$nota->lugarEntrega}}</p>
@foreach($detalles as $detalle)
<h4>
	<p>
	   Cantidad: {{$detalle->cantidad}}
	   Elemento: {{$detalle->idArticulo}}
	   Servicio: {{$detalle->idServicio}}
	   Observaciones: {{$detalle->descripcion}}
	   Subtotal: {{$detalle->subtotal}}
	</p>
</h4>
@endforeach
<p>Apuntes: {{$nota->apunte}}</p>
<p>Total inicial: {{$nota->total}}</p>
<p>Restante: {{$nota->restante}}</p>
<a href="{{route('notas.historialPagos',$nota->id)}}">Pagos</a>
<form action="{{route('notas.moverNota')}}" method="POST">
	@csrf @method('PATCH')
	<input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
    <button type="submit">Mover nota</button>
</form>
<form action="{{route('notas.todolisto')}}" method="POST">
	@csrf @method('PATCH')
	<input id="idNota" name="idNota" type="hidden"  value={{$nota->id}}>
    <button type="submit">Nota lista</button>
</form>
<a href="{{route('inicio')}}">Regresar</a>
</x-layouts.app>