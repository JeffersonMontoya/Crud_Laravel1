<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [ProductoController::class, 'index'])->name('crud.index');


Route::post('/Registrar-producto', [ProductoController::class, 'create'])->name('crud.create');


Route::post('/Modifica-producto', [ProductoController::class, 'update'])->name('crud.update');



Route::get('/Eliminar-producto-{id}', [ProductoController::class, 'delete'])->name('crud.delete');






