<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;


Route::get('inicio',[NotaController::class, 'inicio'])->name('inicio');
Route::get('/',[NotaController::class, 'welcome'])->name('welcome');

Route::get('/login',function(){
return 'Login Page';
})->name('login');

Route::get('/nuevanota',[NotaController::class, 'nuevanota'])->name('notas.nuevanota');
Route::post('/buscar',[NotaController::class, 'search'])->name('notas.search');
Route::get('/listado',[NotaController::class, 'index'])->name('notas.index');
Route::patch('/creando',[NotaController::class, 'store'])->name('notas.store');
Route::post('/datosEntrega',[NotaController::class, 'storeDatosCliente'])->name('notas.storeDatosCliente');
Route::get('/registro/{idr}',[NotaController::class, 'indexdetallenotas'])->name('notas.indexdetallenotas');
Route::post('/guardardn',[NotaController::class, 'storeDetallesNota'])->name('notas.storeDetallesNota');
Route::delete('/cancelar/{idNota}',[NotaController::class, 'cancelarNota'])->name('notas.cancelarNota');
Route::patch('/notalista',[NotaController::class, 'todolisto'])->name('notas.todolisto');
Route::patch('/moviendo',[NotaController::class, 'moverNota'])->name('notas.moverNota');
Route::get('/historial/{id}',[NotaController::class, 'historialPagos'])->name('notas.historialPagos');
Route::patch('/registrarPago',[NotaController::class, 'registrarPago'])->name('notas.registrarPago');
Route::patch('/nota/datospago',[NotaController::class, 'datosPago'])->name('notas.datosPago');
Route::patch('/pagoMenu/{id}',[NotaController::class, 'datosPagoMenu'])->name('notas.datosPagoMenu');
Route::post('/guardarpago',[NotaController::class, 'storepago'])->name('notas.storepago');
Route::get('/mostrar/{id}',[NotaController::class, 'show'])->name('notas.show');
Route::patch('/entregaMenu',[NotaController::class, 'datosEntregaMenu'])->name('notas.datosEntregaMenu');
Route::patch('/actualizarEntrega',[NotaController::class, 'updateCreate'])->name('notas.updateCreate');





