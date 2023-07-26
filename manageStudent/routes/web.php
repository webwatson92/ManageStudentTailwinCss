<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\SettingController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('niveaux')->group(function(){
        Route::get('/', [NiveauController::class, 'index'])->name('niveaux.index');
    });
    Route::prefix('settings')->group(function(){
        Route::get('/', [SettingController::class, 'index'])->name('school_years');
    });
});
