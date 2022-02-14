<?php


use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::name('auth.')->group(function (){
    Route::controller(LoginController::class)->group(function (){
        Route::prefix("login")->name("login")->group(function (){
            Route::get('/',"loginView")->name(".view");
            Route::post('/',"login");
        });
        Route::get('/logout', "logout")->name('logout');
    });
    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::prefix("forgot-password")->name("forgotPassword")->group(function (){
            Route::get('/',"forgotPasswordView")->name('.view');
            Route::post('/',"forgotPassword");
        });
        Route::prefix("reset-password")->name("password-reset")->group(function (){
            Route::get('/{token}', "resetPasswordView")->name('.view');
            Route::post('/', "resetPassword");
        });
    });
});
