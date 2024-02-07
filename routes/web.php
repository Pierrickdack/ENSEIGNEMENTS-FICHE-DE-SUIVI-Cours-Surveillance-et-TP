<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FicheController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DelegueController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TableDelController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\TableProfController;
use App\Http\Controllers\AuthDelegueController;
use App\Http\Controllers\AuthEnseignantController;
use App\Http\Controllers\AuthAdministrateurController;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Routes pour la connexion
Route::get('/signin', function () {
    return view('signin/signindel');
})->name('signin');

Route::get('/signinprof', function () {
    return view('signin/signinprof');
})->name('signinprof');

Route::get('/signinchef', function () {
    return view('signin/signinchef');
})->name('signinchef');

// Routes pour le délégué
Route::post('/delegue', function () {
    return view('delegue/accueil');
})->name('delegue');

Route::get('/fiche', function () {
    return view('delegue/fiche');
})->name('fiche');

Route::get('/accueilDel', function () {
    return view('delegue/accueil');
})->name('accueilDel');

Route::get('contact/delegue', function () {
    return view('');
});



// Routes pour l'authentification des utilisateurs
Route::post('/delegue/accueil', [AuthDelegueController::class, 'login'])->name('delegue.login');
Route::post('/enseignant/accueil', [AuthEnseignantController::class, 'login'])->name('enseignant.login');
Route::post('/administrateur/accueil', [AuthAdministrateurController::class, 'login'])->name('admin.login');


// Routes pour les actions sur la fiche de suivi
Route::post('/enregistrer-fiche', [FicheController::class, 'enregistrerFiche'])->name('enregistrer-fiche');
Route::delete('/fiches/{fiche}', [AnalyticsController::class, 'destroy'])->name('fiche.destroy');

// Routes du MenuList
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/delegue', [AuthDelegueController::class, 'index'])->name('delegue');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');

// Route pour afficher les délégués
Route::get('/delegues', [TableDelController::class, 'main'])->name('delegues.main');
Route::get('/professeurs', [TableProfController::class, 'main'])->name('professeurs.main');
// Route::get('/delegues/{delegue}/edit', [TableDelController::class, 'edit'])->name('delegues.edit');
Route::delete('/delegues/{delegue}', [TableDelController::class, 'destroy'])->name('delegues.destroy');
Route::delete('/professeurs/{professeur}', [TableProfController::class, 'destroy'])->name('enseignants.destroy');




// Routes pour les actions du chef
Route::get('/dashboard', function () {
    return view('chef.index');
})->name('Dashboard_chef');




Route::post('/enregistrer-professeur', [AuthEnseignantController::class, 'store'])->name('enregistrer.professeur');
Route::post('/enregistrer-delegue', [AuthDelegueController::class, 'store'])->name('enregistrer.delegue');
