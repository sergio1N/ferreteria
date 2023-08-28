<?php
use App\Http\Controllers\productosController;
use App\Http\Controllers\BusquedaproController;
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
<<<<<<< HEAD
Route::get('/productos/agregar', [ProductosController::class, 'index'])->name('productos.agregar');

//select marcas
route::get('/productos/agregar',[productosController::class,'create'])->name('productos.create');
//select categoria
//route::get('/agregarproducto',[productosController::class,'createcategoria'])->name('crearpro.createcategoria');

=======
route::get('/agregarproducto',[productosController::class,'index'])->name('aggPro.index');
>>>>>>> 77eaa353ad91cf7abb6bd1524626be6170d7508e
//crear producto
route::post('/agregarprducto',[productosController::class,'store'])->name('crearpro.store');

//barra de busqueda
route::get('/prueba/index', [App\Http\Controllers\BusquedaproController::class,'index'])->name('busquedapro.index');
// editar producto 
route::get('/prueba/edit/{id}', [App\Http\Controllers\BusquedaproController::class,'edit'])->name('busquedapro.edit');