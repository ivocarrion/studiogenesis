<?php

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/admin', function () {
    return view('admin');
});

// Route::get('/index', function () {
//     return view('productos.index');
// });
Auth::routes();
// Route::get('/categorias', function(){
//     return \App\Models\     Categoria::all();
// });
Route::get('/galeriaproductos/{id}/', '\App\Http\Controllers\GaleriaProductoController@eliminarimagen')->name('galeriaproductos');
Route::resource('categorias', '\App\Http\Controllers\CategoriaController');
Route::resource('productos', '\App\Http\Controllers\ProductoController');
Route::get('/eliminartarifa/{id}', '\App\Http\Controllers\EliminarTarifaController@eliminartarifa')->name('eliminartarifa');
Route::resource('productotarifa', '\App\Http\Controllers\ProductoTarifaController');
// Route::resource('galeriaproductos', '\App\Http\Controllers\GaleriaProductoController');

// Route::resource('categorias', '\App\Http\Controllers\CategoriaController::class])->name('categorias');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
