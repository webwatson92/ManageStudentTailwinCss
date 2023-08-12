<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AttributionController;
use App\Http\Controllers\StudentParentController;
use App\Http\Controllers\FraisScolariteController;

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
        Route::get('/', [NiveauController::class, 'index'])->name('niveaux');
    });
    Route::prefix('settings')->group(function(){
        Route::get('/', [SchoolController::class, 'index'])->name('school_years');
        Route::get('/creation-d-annee-scolaire', [SchoolController::class, 'create'])->name('creation.anneescolaire');
        Route::get('/creation-niveau-de-classe', [NiveauController::class, 'create'])->name('creation.niveaux');
        Route::get('/edition-niveau/{niveau}', [NiveauController::class, 'edit'])->name('edition.niveaux');
    });
    Route::prefix('classe')->group(function(){
        Route::get('/', [ClasseController::class, 'index'])->name('classe');
        Route::get('/creation-de-classe', [ClasseController::class, 'create'])->name('creation.classe');
        Route::get('/edition-de-classe/{classe}', [ClasseController::class, 'edit'])->name('edition.classe');
    });
    Route::prefix('eleve')->group(function(){
        Route::get('/', [EleveController::class, 'index'])->name('eleve');
        Route::get('/creation-compte-eleve', [EleveController::class, 'create'])->name('inscription.eleve');
        Route::get('/details-informations-eleve/{eleve}', [EleveController::class, 'show'])->name('show.eleve');
        Route::get('/modificatin-des-infos-eleve/{eleve}', [EleveController::class, 'edit'])->name('edition.eleve');
    });
    
    Route::prefix('inscription')->group(function(){
        Route::get('/', [AttributionController::class, 'index'])->name('inscription');
        Route::get('/compte/eleve', [AttributionController::class, 'create'])->name('creation.attribution');
        Route::get('/modification/{eleve}', [AttributionController::class, 'edit'])->name('edition.attribution');
    });
    Route::prefix('paiement')->group(function(){
        Route::get('/', [PaymentController::class, 'index'])->name('paiement');
        Route::get('/paiement/eleve', [PaymentController::class, 'create'])->name('creation.paiement');
        // Route::get('/modification/{eleve}', [AttributionController::class, 'edit'])->name('edition.attribution');
    });
    Route::prefix('parent')->group(function(){
        Route::get('/', [StudentParentController::class, 'index'])->name('parentEleve');
        Route::get('/parent-eleve', [StudentParentController::class, 'create'])->name('creation.parentEleve');
        Route::get('/modification/{parent}', [StudentParentController::class, 'edit'])->name('edition.parentEleve');
    });
    Route::prefix('frais-soclarite')->group(function(){
        Route::get('/', [FraisScolariteController::class, 'index'])->name('frais');
        Route::get('/ajouter', [FraisScolariteController::class, 'create'])->name('creation.frais');
        Route::get('/modification/{frais}', [FraisScolariteController::class, 'edit'])->name('edition.frais');
    });
});
/* 
* Bout de code permettant d'ajouter de nouvelles routes dans le repertoire web pour les intégrer à ce fichier web.php
* Elle permet permet d'avoir plusieurs fichiers de routes 
*/

foreach(File::allFiles(__DIR__.'/web') as $route_file){
    require $route_file->getPathname();
}
