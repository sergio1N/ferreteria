<?php
use App\Http\Controllers\productosController;
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
    return view('index');
});

//mostrar vista agragar productos
route::get('/agregarproducto',[productosController::class,'index'])->name('aggPro.index');
//crear producto
route::post('/agregarprodcto',[productosController::class,'store'])->name('crearpro.store');