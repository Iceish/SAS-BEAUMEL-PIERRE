<?php

use App\Http\Controllers\Dashboard\CkeditorController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\InvoiceClientController;
use App\Http\Controllers\Dashboard\InvoiceController;
use App\Http\Controllers\Dashboard\InvoiceProviderController;
use App\Http\Controllers\Dashboard\PartnerController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProviderController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\VehicleController;
use App\Http\Controllers\Guest\ContactUsController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TicketsController;
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


});



Route::controller(ContactUsController::class)->name('contactus.')->group(function (){

    Route::get('contactus','create')->name('create');

    Route::post('contactus','store')->name('store');

});

Route::name('dashboard.')->prefix('dashboard')->group(function (){
    Route::get('/', [HomeController::class,'index'])
        ->name('home');
    Route::resource('users',UserController::class);
    Route::resource('roles',RoleController::class);

    Route::name('invoices.')->prefix('invoices')->group(function (){
        Route::get('/', [InvoiceController::class,'index'])->name('index');
        Route::resource('clients', InvoiceClientController::class);
        Route::resource('providers', InvoiceProviderController::class);
    });
    Route::resource('clients', ClientController::class);
    Route::resource('providers', ProviderController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('products', ProductController::class);
    Route::post('/store-image', [CkeditorController::class,'storeImage'])
        ->name('store-image');
    Route::post('/delete-image', [CkeditorController::class,'deleteImage'])
        ->name('delete-image');
    Route::post('/upload-ck', [CkeditorController::class,'storeCkeditor'])
        ->name('store-content');
});
Route::get('/ck', [CkeditorController::class,'index']);




require_once 'auth.php';
