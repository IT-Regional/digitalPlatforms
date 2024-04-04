<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\PerfilController;
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

/* Route::get('/', function () {
    return view('welcome');
});
 */

 //Rutas principales
Route::get('/', function () { return view('login'); });
Route::post('/login', [LoginController::class, 'login'])-> name('login');
Route::get('/home', [AdminController::class, 'numberUsers']) -> name('home');
Route::get('/users', [AdminController::class,'customers'])->name('users');
Route::get('plataformas',[AdminController::class,'index'])->name('plataformas');
Route::get('/plataformas/create', [PlataformaController::class, 'create'])->name('plataformas.create');
Route::get('/cuentas/create', [CuentaController::class, 'create'])->name('cuentas.create');
Route::get('/customer_info/{customerId}',[AdminController::class,'showCustomerInfo'])->name('customer_info');
Route::resource('/plataformas_create', PlataformaController::class);
Route::post('/plataformas', [PlataformaController::class, 'store'])->name('plataformas.store');
Route::post('/cuentas', [CuentaController::class, 'store'])->name('cuentas.store');
Route::get('/perfiles/create', [PerfilController::class, 'create'])->name('perfiles.create');
Route::post('/perfiles', [PerfilController::class, 'store'])->name('perfiles.store');
Route::get('/plataformas/{plataforma}/cuentas', 'App\Http\Controllers\PlataformaController@cuentas')->name('plataformas.cuentas');

