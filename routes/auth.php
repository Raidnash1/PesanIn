<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\KedaiAuthController;
use App\Http\Controllers\Auth\PelangganAuthController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RegisteredKedaiController;
use App\Http\Controllers\Auth\RegisteredPelangganController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});
Route::group(['prefix' => 'kedai'], function () {
    Route::get('register', [RegisteredKedaiController::class, 'create'])
        ->name('register')->name('kedai.register');

    Route::post('register', [RegisteredKedaiController::class, 'store'])->name('kedai.register');

    Route::get('login', [KedaiAuthController::class, 'create'])
        ->name('store')->name('kedai.login');

    Route::post('login', [KedaiAuthController::class, 'store'])->name('kedai.login');
});

//pelanggan login
Route::get('pelanggan/register', [RegisteredPelangganController::class, 'create'])
    ->name('pelanggan.register');

Route::post('pelanggan/register', [RegisteredPelangganController::class, 'store'])->name('pelanggan.register');


Route::get('pelanggan/login', [PelangganAuthController::class, 'create'])->name('pelanggan.login');

Route::post('pelanggan/login', [PelangganAuthController::class, 'store'])->name('pelanggan.login');


Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
