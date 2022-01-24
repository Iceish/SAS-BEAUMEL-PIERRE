<?php

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

Route::get('/', [GuestController::class,"home"])
    ->name("Home");

Route::get('/about', [GuestController::class,"about"])
    ->name("About");

Route::get('/clients', [GuestController::class,"clients"])
    ->name("Clients");

Route::get('/partners', [GuestController::class,"partners"])
    ->name("Partners");


Route::name('Dashboard.')->prefix("dashboard/")->group(function (){
    Route::name('Users.')->prefix("users/")->middleware(['role:super-admin'])->group(function (){
        Route::get('/', [UserController::class,"index"])
            ->name("View");
    });
});

require_once "auth.php";
