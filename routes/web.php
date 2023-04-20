<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', [App\Http\Controllers\Controller::class, 'inicio'])->name('inicio');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('indexAdmi', function () {
    return view('layouts.admin');
});

Route::group(['middleware' => 'auth'], function() {

    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);

    Route::prefix('clientes')->group(function () {
        Route::get('/', [ClientesController::class, 'listClientes']);
        Route::get('js00', [ClientesController::class, 'js00']);
        Route::get('archivados', [ClientesController::class, 'listClientesArc']);
        Route::get('nuevo', [ClientesController::class, 'createCliente']);
        Route::post('registrar', [ClientesController::class, 'storecliente']);
        Route::get('detalles/{id}', [ClientesController::class, 'showCliente']);
        Route::put('actualizar/{id}', [ClientesController::class, 'updateCliente']);
        Route::get('desactivar/{id}', [ClientesController::class, 'deleteLCliente']);
        Route::get('activar/{id}', [ClientesController::class, 'activateCliente']);
        Route::get('eliminar/{id}', [ClientesController::class, 'deleteFCliente']);
        Route::get('pdf', [ClientesController::class, 'createPDFClientes']);
    });

        // PRODUCTOS
    Route::prefix('productos')->group(function () {
        Route::name('/')->get('/', [ProductoController::class, 'indexProducto']);
        Route::get('agregar/', [ProductoController::class, 'agregarProducto']);
        Route::post('salvarProducto/', [ProductoController::class, 'salvarProducto']);
        Route::name('detalleProducto')->get('detalles/{id}', [ProductoController::class, 'detalleProducto']);
        Route::get('eliminar/{id}', [ProductoController::class, 'borrarProducto']);
        Route::get('editar/{id}',[ProductoController::class,'editarProducto']);
        Route::put('actualizarProducto/{id}',[ProductoController::class,'actualizarProducto']);    
    });

        // CATEGORIAS
        Route::name('indexCategoria')->get('indexCategoria/', [CategoriaController::class, 'indexCategoria']);
        Route::name('salvarCategoria')->post('salvarCategoria/', [CategoriaController::class, 'salvarCategoria']);
        Route::name('detalleCategoria')->get('detalleCategoria/{id}', [CategoriaController::class, 'detalleCategoria']);
        Route::name('borrarCategoria')->get('borrarCategoria/{id}', [CategoriaController::class, 'borrarCategoria']);
        Route::name('agregarCategoria')->get('agregarCategoria/', [CategoriaController::class, 'agregarCategoria']);
        Route::name('editarCategoria')->get('editarCategoria/{id}',[CategoriaController::class,'editarCategoria']);
        Route::name('actualizarCategoria')->put('actualizarCategoria/{id}',[CategoriaController::class,'actualizarCategoria']);

});