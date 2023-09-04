<?php
use App\Http\Controllers\productosController;
use App\Http\Controllers\BusquedaproController;
use App\Http\Controllers\marcaController;
use App\Http\Controllers\categoriaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

//mostrar vista agragar productos
Route::get('/home/productos', [ProductosController::class, 'index'])->name('productos.agregar');
//select option
route::get('/home/productos',[productosController::class,'create'])->name('productos.create');

//crear marca
route::post('/productos/agregar4',[marcaController::class,'store'])->name('marca.store');
//crear categoria
route::post('/productos/agregar5',[categoriaController::class,'store'])->name('categoria.store');
//crear producto
route::post('/agregar/producto',[productosController::class,'store'])->name('crearpro.store');

//barra de busqueda
route::get('/prueba/index', [BusquedaproController::class,'index'])->name('{busquedapro.index}');
// editar producto 
route::get('/prueba/edit/{id}', [BusquedaproController::class,'edit'])->name('busquedapro.edit');