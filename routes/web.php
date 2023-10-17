<?php
use App\Http\Controllers\productosController;
use App\Http\Controllers\BusquedaproController;
use App\Http\Controllers\marcaController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\roles\adminAuthController;
use App\Http\Controllers\roles\contableAuthController;
use App\Http\Controllers\roles\almacenistaAuthController;
use App\Http\Controllers\roles\invitadoAuthController;
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
Route::get('/productos', [ProductosController::class, 'create'])->name('productos.agregar');
//prueba de inicio de sesion
Route::get('/iniciologin', [ProductosController::class, 'index'])->name('productos.index');
//crear marca
route::post('/productos/agregar4',[marcaController::class,'store'])->name('marca.store');
//crear categoria
route::post('/productos/agregar5',[categoriaController::class,'store'])->name('categoria.store');
//crear producto
route::post('/agregar/producto',[productosController::class,'store'])->name('crearpro.store');

// Ruta de búsqueda de productos
Route::get('/prueba/index', [BusquedaproController::class, 'index'])->name('busquedapro.index');

// Ruta para editar producto
Route::get('/prueba/edit/{id}', [BusquedaproController::class, 'edit'])->name('busquedapro.edit');
// ruta actualisar producto
Route::put('producto/actualizar/{idproducto}', [ProductosController::class, 'update'])->name('producto.update');


//inicio de sesion/--------------------------------------------------------------------------------------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//--------------------------------------------------------------------------------------------------------------

//autenticacion admin
route::get('/admin',[adminAuthController::class, 'index'])
->middleware('auth.admin')
->name('admin.index');
//autentificacion contable
route::get('/contable',[contableAuthController::class, 'index'])
->middleware('auth.contable')
->name('contable.index');
//autentificacion almacenista
route::get('/almacenista',[almacenistaAuthController::class, 'index'])
->middleware('auth.almacenista')
->name('almacenista.index');
//autenticacion invitado
route::get('/invitado',[invitadoAuthController::class, 'index'])
->middleware('auth.invitado')
->name('invitado.index');