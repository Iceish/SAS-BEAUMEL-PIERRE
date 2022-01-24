<?php


use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::name('auth.')->group(function (){
    Route::get('/login',[LoginController::class,"loginView"])
        ->name("login.view");

    Route::post('/login',[LoginController::class,"login"])
        ->name("login");

    Route::get('/forgot-password',[ForgotPasswordController::class,"forgotPasswordView"])
        ->name('forgotPassword.view');

    Route::post('/forgot-password',[ForgotPasswordController::class,"forgotPassword"])
        ->name('forgotPassword');

    Route::get('/reset-password/{token}', [ForgotPasswordController::class,"resetPasswordView"])
        ->name('password.reset.view');

    Route::post('/reset-password', [ForgotPasswordController::class,"resetPassword"])
        ->name('password.reset');
});

