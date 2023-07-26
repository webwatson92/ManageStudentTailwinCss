<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\SchoolController;

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
        Route::get('/', [SchoolController::class, 'index'])->name('school_years');
        Route::get('/creation-d-annee-scollaire', [SchoolController::class, 'create'])->name('create.anneescolaire');
    });
});

/* 
* Bout de code permettant d'ajouter de nouvelles routes dans le repertoire web pour les intégrer à ce fichier web.php
* Elle permet permet d'avoir plusieurs fichiers de routes 
*/

foreach(File::allFiles(__DIR__.'/web') as $route_file){
    require $route_file->getPathname();
}
