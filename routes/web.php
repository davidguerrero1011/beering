<?php

use App\Http\Controllers\Configuration\ConfigurationController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Login\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'validateLogin'])->name('login');
Route::post('/me', [LoginController::class, 'me'])->name('me');

Route::middleware('web')->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/typeuser/{id}', [HomeController::class, 'getTypeUser'])->name('typeuser');
    Route::post('/account/{id}', [HomeController::class, 'account'])->name('account');

    // Configuration
    Route::prefix('configuration')->group(function () {
        Route::get('/list/{type}', [ConfigurationController::class, 'index'])->where('type', '[0-9]+')->name('list');
        Route::get('/create/{type}', [ConfigurationController::class, 'create'])->name('create');
        Route::get('/edit/{id}/{type}', [ConfigurationController::class, 'edit'])->name('edit');
        Route::post('/store/{type}', [ConfigurationController::class, 'store'])->name('store');
        Route::put('/update/{id}/{type}', [ConfigurationController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}/{type}', [ConfigurationController::class, 'destroy'])->name('destroy');
        Route::put('/update-status', [ConfigurationController::class, 'updateStatus'])->name('update-status');
    });
});
