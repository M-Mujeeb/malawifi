<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('profiles.create');
});

Route::get('/sign-in', [ProfileController::class, 'login'])->name('login');
Route::post('/sign-in', [ProfileController::class, 'loginSubmit'])->name('profiles.loginSubmit');

Route::get('/register', [ProfileController::class, 'register'])->name('profiles.register');
Route::post('/register', [ProfileController::class, 'registerSubmit'])->name('profiles.registerSubmit');

Route::middleware(['auth', 'require.token'])->group(function () {
    Route::get('/create', [ProfileController::class, 'create'])->name('profiles.create');
    Route::patch ('/create', [ProfileController::class, 'store'])->name('profiles.store');
});


Route::get('/qr/{user:username}', [ProfileController::class, 'wifiQr'])->name('profiles.wifiQr');
Route::get('/{user:username}', [ProfileController::class, 'show'])->name('profiles.show');

Route::post('/logout', [ProfileController::class, 'logout'])->name('profiles.logout');
