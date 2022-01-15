<?php


use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::name('Auth.')->group(function (){
    Route::get('/login',[LoginController::class,"loginView"])
        ->name("Login.View");

    Route::post('/login',[LoginController::class,"login"])
        ->name("Login");

    Route::get('/forgot-password',[ForgotPasswordController::class,"forgotPasswordView"])
        ->name('ForgotPassword.View');

    Route::post('/forgot-password',[ForgotPasswordController::class,"forgotPassword"])
        ->name('ForgotPassword');

    Route::get('/reset-password/{token}', [ForgotPasswordController::class,"resetPasswordView"])
        ->name('Password.Reset.View');

    Route::post('/reset-password', [ForgotPasswordController::class,"resetPassword"])
        ->name('Password.Reset');
});

