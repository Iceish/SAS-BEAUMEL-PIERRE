<?php

use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\VitrineController;
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

Route::get('/', [VitrineController::class,"home"])
    ->name("Home");

Route::get('/about', [VitrineController::class,"about"])
    ->name("About");

Route::get('/clients', [VitrineController::class,"clients"])
    ->name("Clients");

Route::get('/partners', [VitrineController::class,"partners"])
    ->name("Partners");


Route::name('Dashboard.')->prefix("dashboard/")->group(function (){
    Route::get('users', [UserController::class,"index"])
        ->name("Users.View");
});

require_once "auth.php";



