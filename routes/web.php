<?php

use App\Http\Controllers\Dashboard\CustomerInvoiceController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\GuestController;
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

Route::controller(GuestController::class)->group(function (){
    Route::get('/', 'home')
        ->name('home');

    Route::get('/about', 'about')
        ->name('about');

    Route::get('/clients','clients')
        ->name('clients');

    Route::get('/partners', 'partners')
        ->name('partners');

    Route::get('/contactus', 'contactus')
        ->name('contactus');

});



Route::name('dashboard.')->prefix('dashboard')->middleware(['permission:dashboard.*'])->group(function (){
    Route::get('/', [HomeController::class,'index'])
        ->name('home');
    Route::resource('users',UserController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('customer-invoices', CustomerInvoiceController::class);
});

require_once 'auth.php';
