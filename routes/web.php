<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PrendaController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AutheticatedSessionController;

Route::get('/send-message',[TestController::class, 'sendMessage'])->name('sendMessage');

Route::get('inicio',[NotaController::class, 'inicio'])->name('inicio');
Route::get('/',[NotaController::class, 'welcome'])->name('welcome');
Route::view('/registro','auth.registro')->name('registro');

Route::post('/ustore',[RegisteredUserController::class, 'ustore'])->name('user.store');
Route::post('/sesion',[AutheticatedSessionController::class, 'astore'])->name('session');
Route::post('/terminar',[AutheticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/login',[RegisteredUserController::class, 'login'])->name('login');

Route::view('/notas','notas.inicioNotas')->name('notas.inicioNotas');
Route::post('/eliminar/{idr}',[NotaController::class, 'eliminar'])->name('notas.eliminar');//PROBAR SIN USAR
Route::get('/nuevanota',[NotaController::class, 'nuevanota'])->name('notas.nuevanota');
Route::post('/buscar',[NotaController::class, 'search'])->name('notas.search');

Route::get('/listado',[NotaController::class, 'index'])->name('notas.index');
Route::get('/ingresos',[NotaController::class, 'ingresos'])->name('archivo.ingresos');
Route::post('/fechasIngreso',[NotaController::class, 'entreFechas'])->name('archivo.entreFechas');

Route::patch('/creando',[NotaController::class, 'store'])->name('notas.store');
Route::post('/datosEntrega',[NotaController::class, 'storeDatosCliente'])->name('notas.storeDatosCliente');
Route::get('/listado/{idr}',[NotaController::class, 'indexdetallenotas'])->name('notas.indexdetallenotas');
Route::post('/guardardn',[NotaController::class, 'storeDetallesNota'])->name('notas.storeDetallesNota');
Route::post('/addDetalle/{idr}',[NotaController::class, 'addDetalle'])->name('notas.addDetalle');
Route::delete('/cancelar/{idNota}',[NotaController::class, 'cancelarNota'])->name('notas.cancelarNota');
Route::patch('/notalista',[NotaController::class, 'todolisto'])->name('notas.todolisto');
Route::patch('/entregando',[NotaController::class, 'entregarNota'])->name('notas.entregarNota');
Route::get('/historial/{id}',[NotaController::class, 'historialPagos'])->name('notas.historialPagos');
Route::patch('/registrarPago',[NotaController::class, 'registrarPago'])->name('notas.registrarPago');
Route::patch('/nota/datospago',[NotaController::class, 'datosPago'])->name('notas.datosPago');
Route::patch('/pagoMenu/{id}',[NotaController::class, 'datosPagoMenu'])->name('notas.datosPagoMenu');
Route::post('/guardarpago',[NotaController::class, 'storepago'])->name('notas.storepago');
Route::get('/mostrar/{id}',[NotaController::class, 'show'])->name('notas.show');
Route::patch('/entregaMenu',[NotaController::class, 'datosEntregaMenu'])->name('notas.datosEntregaMenu');
Route::patch('/actualizarEntrega',[NotaController::class, 'updateCreate'])->name('notas.updateCreate');
Route::post('/buscarNota',[NotaController::class, 'search'])->name('notas.search');

Route::view('/crear','clientes.nuevo')->name('clientes.nuevo');
Route::post('/storeCliente',[ClientesController::class, 'store'])->name('clientes.store');
Route::get('/cliente/{cel}',[ClientesController::class, 'paranota'])->name('clientes.paranota');

Route::get('/clientesInicio',[ClientesController::class, 'inicioClientes'])->name('clientes.inicioClientes');
Route::get('/VerCliente/{id}',[ClientesController::class, 'ver'])->name('clientes.ver');
Route::post('/editar',[ClientesController::class, 'editar'])->name('clientes.editar');
Route::patch('/Update',[ClientesController::class, 'update'])->name('clientes.update');
Route::post('/buscarCliente',[ClientesController::class, 'search'])->name('clientes.search');
Route::delete('/eliminar/{idc}',[ClientesController::class, 'eliminarCliente'])->name('clientes.eliminarCliente');

Route::get('/prendasInicio',[PrendaController::class, 'inicioPrendas'])->name('prendas.inicioPrendas');
Route::get('/VerPrenda/{id}',[PrendaController::class, 'ver'])->name('prendas.ver');
Route::get('/nuevo',[PrendaController::class, 'nuevo'])->name('prenda.nuevo');
Route::post('/store',[PrendaController::class, 'store'])->name('prendas.store');
Route::post('/buscar',[PrendaController::class, 'show'])->name('prendas.show');
Route::delete('delete/{id}',[PrendaController::class, 'destroy'])->name('prendas.delete');

Route::get('/servicioInicio',[ServicioController::class, 'inicioServicios'])->name('servicios.inicioServicios');
Route::get('/VerServicio/{id}',[ServicioController::class, 'ver'])->name('servicios.ver');
Route::view('/nuevoServicio','servicios.nuevo')->name('servicios.create');
Route::post('/storeServicio',[ServicioController::class, 'store'])->name('servicios.store');
Route::post('/buscaServicio',[ServicioController::class, 'show'])->name('servicios.show');







