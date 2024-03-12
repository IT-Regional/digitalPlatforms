<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
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
Route::get('/home', [AdminController::class, 'home']) -> name('home');
Route::get('/users', [AdminController::class,'customers'])->name('users');
Route::get('/customer_info/{customerId}',[AdminController::class,'showCustomerInfo'])->name('customer_info');