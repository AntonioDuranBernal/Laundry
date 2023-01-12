<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AutheticatedSessionController;

Route::get('inicio',[NotaController::class, 'inicio'])->name('inicio');
Route::get('/',[NotaController::class, 'welcome'])->name('welcome');
Route::view('/registro','auth.registro')->name('registro');

Route::post('/ustore',[RegisteredUserController::class, 'ustore'])->name('user.store');
Route::post('/sesion',[AutheticatedSessionController::class, 'astore'])->name('session');
Route::post('/terminar',[AutheticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/login',[RegisteredUserController::class, 'login'])->name('login');

Route::view('/prendas','prendas.inicioPrendas')->name('prendas.inicioPrendas');
Route::view('/servicios','servicios.inicioServicios')->name('servicios.inicioServicios');

Route::view('/notas','notas.inicioNotas')->name('notas.inicioNotas');
Route::get('/nuevanota',[NotaController::class, 'nuevanota'])->name('notas.nuevanota');
Route::post('/buscar',[NotaController::class, 'search'])->name('notas.search');
Route::get('/listado',[NotaController::class, 'index'])->name('notas.index');
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

Route::post('/editar',[ClientesController::class, 'editar'])->name('clientes.editar');
Route::patch('/Update',[ClientesController::class, 'update'])->name('clientes.update');
Route::post('/store',[ClientesController::class, 'store'])->name('cliente.store');
Route::view('/nuevo','clientes.nuevo')->name('clientes.nuevo');
Route::view('/clientes','clientes.inicioClientes')->name('clientes.inicioClientes');
Route::post('/buscarCliente',[ClientesController::class, 'search'])->name('clientes.search');
Route::delete('/eliminar/{idc}',[ClientesController::class, 'eliminarCliente'])->name('clientes.eliminarCliente');






