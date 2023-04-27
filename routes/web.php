<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\KilometrajeController;
use App\Http\Controllers\ViaticoController;

Route::get('/inicio', [App\Http\Controllers\Controller::class, 'inicio'])->name('inicio');

Route::get('indexAdmi', function () {
    return view('layouts.admin');
});


Route::group(['middleware' => 'auth'], function() {

    Route::get('/', [App\Http\Controllers\Controller::class, 'home']);

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
            Route::name('/')->get('/', [App\Http\Controllers\ProductoController::class, 'indexProducto']);
            Route::get('agregar/', [App\Http\Controllers\ProductoController::class, 'agregarProducto']);
            Route::post('salvarProducto/', [App\Http\Controllers\ProductoController::class, 'salvarProducto']);
            Route::name('detalleProducto')->get('detalles/{id}', [App\Http\Controllers\ProductoController::class, 'detalleProducto']);
            Route::get('eliminar/{id}', [App\Http\Controllers\ProductoController::class, 'borrarProducto']);
            Route::get('editar/{id}',[App\Http\Controllers\ProductoController::class,'editarProducto']);
            Route::put('actualizarProducto/{id}',[App\Http\Controllers\ProductoController::class,'actualizarProducto']);    
            Route::get('tallas',[App\Http\Controllers\ProductoController::class,'registrarTallas']);
            Route::post('salvarTalla/', [App\Http\Controllers\ProductoController::class, 'salvarTalla']);
        });

        // KILOMETRAJE
        Route::get('/kilometrajes', [App\Http\Controllers\KilometrajeController::class, 'index'])->name('kilometrajes.index');
        Route::get('/kilometrajes/{kilometraje}/edit', [App\Http\Controllers\KilometrajeController::class, 'edit'])->name('kilometrajes.edit');
        Route::put('/kilometrajes/{kilometraje}', [App\Http\Controllers\KilometrajeController::class, 'update'])->name('kilometrajes.update');

        // CATEGORIAS
        Route::name('indexCategoria')->get('indexCategoria/', [CategoriaController::class, 'indexCategoria']);
        Route::name('salvarCategoria')->post('salvarCategoria/', [CategoriaController::class, 'salvarCategoria']);
        Route::name('detalleCategoria')->get('detalleCategoria/{id}', [CategoriaController::class, 'detalleCategoria']);
        Route::name('borrarCategoria')->get('borrarCategoria/{id}', [CategoriaController::class, 'borrarCategoria']);
        Route::name('agregarCategoria')->get('agregarCategoria/', [CategoriaController::class, 'agregarCategoria']);
        Route::name('editarCategoria')->get('editarCategoria/{id}',[CategoriaController::class,'editarCategoria']);
        Route::name('actualizarCategoria')->put('actualizarCategoria/{id}',[CategoriaController::class,'actualizarCategoria']);

        Route::get('/viaticos/create', [App\Http\Controllers\ViaticoController::class, 'create'])->name('viaticos.create');
        Route::post('/viaticos', [App\Http\Controllers\ViaticoController::class, 'store'])->name('viaticos.store');
        Route::get('/viaticos', [App\Http\Controllers\ViaticoController::class, 'index'])->name('viaticos.index');
        Route::get('/viaticos/{viatico}', [App\Http\Controllers\ViaticoController::class, 'show'])->name('viaticos.show');
        Route::get('/viaticos/{viatico}/edit', [App\Http\Controllers\ViaticoController::class, 'edit'])->name('viaticos.edit');
        Route::put('/viaticos/{viatico}', [App\Http\Controllers\ViaticoController::class, 'update'])->name('viaticos.update');
        Route::delete('/viaticos/{viatico}', [App\Http\Controllers\ViaticoController::class, 'destroy'])->name('viaticos.delete');
        Route::get('/buscar', [App\Http\Controllers\ViaticoController::class, 'buscar'])->name('viaticos.buscar');
        Route::get('/buscarf', [App\Http\Controllers\ViaticoController::class, 'buscarf'])->name('viaticos.buscarfecha');

        Route::get('change_status/viaticos/{viatico}', [ViaticoController::class, 'change_status'])->name('change.status.viaticos');

        Route::prefix('cotizaciones')->group(function () {
            Route::get('/', [App\Http\Controllers\CotizacionesController::class, 'listCotizacion']);
            Route::get('detalles/{id}', [App\Http\Controllers\CotizacionesController::class, 'showCotizacion'])->name('detalleCotizacion');
            Route::get('cotizar', [App\Http\Controllers\CotizacionesController::class, 'formCotizacion']);
            Route::get('info_cliente', [App\Http\Controllers\CotizacionesController::class, 'infoCliente'])->name('info_cliente');
            Route::get('select_prendas', [App\Http\Controllers\CotizacionesController::class, 'select_Prendas'])->name('select_prendas');
            Route::get('info_prenda', [App\Http\Controllers\CotizacionesController::class, 'infoPrenda'])->name('info_prenda');    
            Route::post('registrar', [App\Http\Controllers\CotizacionesController::class, 'registrarCotizacion']);
            Route::get('comprobante/{id}', [App\Http\Controllers\CotizacionesController::class, 'comprobanteCotizacion']);
            Route::put('autorizar/{id}', [App\Http\Controllers\CotizacionesController::class, 'autorizar']);
        });

        ///------------------------Almacen-------------------------------------
        Route::prefix('almacen')->group(function () {
            Route::get('/', [App\Http\Controllers\AlmacenController::class, 'listAlmacen']);
            Route::get('nuevo/', [App\Http\Controllers\AlmacenController::class, 'createAlmacen']);
            Route::post('registrar', [App\Http\Controllers\AlmacenController::class, 'storeAlmacen']);
            Route::get('detalles/{id}', [App\Http\Controllers\AlmacenController::class, 'showAlmacen'])->name('detalleMuestrario');
            Route::put('actualizar/{id}', [App\Http\Controllers\AlmacenController::class, 'updateAlmacen']);
            Route::get('editar/{id}', [App\Http\Controllers\AlmacenController::class, 'editarAlmacen']);
            Route::get('entrega/{id}', [App\Http\Controllers\AlmacenController::class, 'entregaAlmacen']);
            Route::get('eliminar/{id}', [App\Http\Controllers\AlmacenController::class, 'deleteAlmacen']);
            Route::get('entrega/{id}', [App\Http\Controllers\AlmacenController::class, 'entregaAlmacen']);
            Route::put('devolucion/{id}', [App\Http\Controllers\AlmacenController::class, 'devolucionPrendas']);
            Route::put('autorizar/{id}', [App\Http\Controllers\AlmacenController::class, 'autorizar']);
            Route::get('infoprenda', [App\Http\Controllers\AlmacenController::class, 'infoPrenda'])->name('infoprenda');
            Route::get('info_categoria', [App\Http\Controllers\AlmacenController::class, 'infoCategoria'])->name('info_categoria');
            Route::get('info_producto', [App\Http\Controllers\AlmacenController::class, 'infoProducto'])->name('info_producto');
            Route::get('info_diseno', [App\Http\Controllers\AlmacenController::class, 'infoDiseno'])->name('info_diseno');
            Route::get('info_entrega', [App\Http\Controllers\AlmacenController::class, 'infoEntrega'])->name('info_entrega');
            Route::get('info_entrega2', [App\Http\Controllers\AlmacenController::class, 'infoEntrega2'])->name('info_entrega2');
            Route::get('muestras', [App\Http\Controllers\AlmacenController::class, 'muestras'])->name('muestras');
            Route::get('corridas', [App\Http\Controllers\AlmacenController::class, 'corridas'])->name('corridas');
        });

        Route::get('/home', [App\Http\Controllers\Controller::class, 'home'])->name('home');
});