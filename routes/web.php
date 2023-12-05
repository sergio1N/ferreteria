<?php
use App\Http\Controllers\productosController;
use App\Http\Controllers\BusquedaproController;
use App\Http\Controllers\marcaController;
use App\Http\Controllers\proveedorcontroller;
use App\Http\Controllers\pedidocontroller;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\roles\adminAuthController;
use App\Http\Controllers\roles\contableAuthController;

use App\Http\Controllers\detallePedidoController;
use App\Http\Middleware\almacenista;
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

//producto/
//mostrar vista agragar productos
Route::get('/productos', [ProductosController::class, 'create'])->name('productos.agregar');
//prueba de inicio de sesion
Route::get('/iniciologin', [ProductosController::class, 'index'])->name('productos.index');

//mostrar producto cliente inicio
Route::get('/', [productosController::class,'mostrarProductos'])->name('productos-mostrar');
//mostar productos vista
route::get('/vistapro',[productosController::class,'show'])->name('productos.vista');


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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//marca/////////////////////////////////////////////////////////////////////////////
// ruta para la vista marca
Route::get('/marca/index', [marcaController::class, 'index'])->name('marca.index');
// Ruta para ocultar marca
Route::post('/marca/hide/{idmarca}', [marcaController::class, 'hide'])->name('marca.hide');
// Ruta para filtrar marcas 
Route::get('/marca/filter', [marcaController::class, 'filter'])->name('marca.filter');
// rutapara ver marcas ocultas
Route::get('/marcas-ocultas', [marcaController::class,'marcasOcultas'])->name('marcas.ocultas');
// colocar marcas visibles 
Route::post('/marcas/show/{idmarca}', [MarcaController::class, 'show'])->name('marca.show');
// Ruta para actualizar marca
Route::post('/marca/update/{idmarca}', [marcaController::class, 'update'])->name('marca.update');
// Ruta para editar marca
Route::get('/marca/edit/{idmarca}', [marcaController::class, 'edit'])->name('marca.edit');
//crear marca
route::post('/productos/agregar4',[marcaController::class,'store'])->name('marca.store');
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//proveedores 
// ruta para la vista proebeedores
Route::get('/proveedor/index', [proveedorController::class, 'index'])->name('proveedor.index');
//crear proveedores
route::post('/proveedor/agregar',[proveedorController::class,'store'])->name('proveedor.store');
//pasar las listas deplegables
Route::get('/proveedor/create', [proveedorController::class, 'create'])->name('proveedor.create');
// desavilitar porveedor 
Route::put('/proveedor/hide/{idproveedor}', [proveedorController::class, 'hide'])->name('proveedor.hide');
//ruta preveedores ocultos 
Route::get('/proveedor/ocultos', [proveedorController::class, 'showHidden'])->name('proveedor.ocultos');
// ruta ocultos 
Route::put('/proveedor/show/{idproveedor}', [proveedorController::class, 'showHidden'])->name('proveedor.show');
//mostrar los prevedores ocultos 
Route::get('/proveedores-ocultos', [proveedorController::class, 'showHiddenIndex'])->name('proveedores-ocultos');
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Pedido
Route::get('/pedido/index', [pedidoController::class, 'index'])->name('pedido.index');
Route::get('/pedido/{nombre}', [pedidoController::class, 'show'])->name('pedidos.show'); 
//Route::get('/pedido/pendientes', [PedidoController::class, 'pedi'])->name('pendientes');
Route::get('/pedido/pendientes', 'App\Http\Controllers\pedidoController@pedi')->name('pendientes');

Route::post('/pedido/store', [PedidoController::class, 'store'])->name('pedido.store');









// Detalle del Pedido
Route::get('/pedido/{id}', [detallePedidoController::class, 'mostrarDetalles'])->name('detalle.pedido');
Route::get('/nombre', [proveedorController::class, 'nombre'])->name('nombre.pedido');


///////////////////////////////////////////////////////////

//categoria////////////////////////////////////////////////////
//crear categoria
route::post('/productos/agregar5',[categoriaController::class,'store'])->name('categoria.store');

////////////////////////////////////////////////////////////////////////////////////////}

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