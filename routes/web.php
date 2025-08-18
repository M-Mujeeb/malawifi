<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/_clear', function () {
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'ok';
});

Route::get('/', function () {
    return view('index');
});



Route::middleware(['auth', 'require.token'])->group(function () {
    Route::get('/create', [ProfileController::class, 'create'])->name('profiles.create');
    Route::patch ('/create', [ProfileController::class, 'store'])->name('profiles.store');
});

Route::middleware('redirect-if-authenticated')->group(function () {
    Route::get('/sign-in', [ProfileController::class, 'login'])->name('login');
    Route::post('/sign-in', [ProfileController::class, 'loginSubmit'])->name('profiles.loginSubmit');
    
    Route::get('/register', [ProfileController::class, 'register'])->name('profiles.register');
    Route::post('/register', [ProfileController::class, 'registerSubmit'])->name('profiles.registerSubmit');
});


Route::get('/qr/{user:username}', [ProfileController::class, 'wifiQr'])->name('profiles.wifiQr');
Route::get('/{user:username}', [ProfileController::class, 'show'])->name('profiles.show');

Route::post('/logout', [ProfileController::class, 'logout'])->name('profiles.logout');


/** Google OAuth */
Route::get('/auth/google/redirect', [ProfileController::class, 'googleRedirect'])->name('oauth.google.redirect');
Route::get('/auth/google/callback', [ProfileController::class, 'googleCallback'])->name('oauth.google.callback');