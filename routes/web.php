<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EvenementController;
use Illuminate\Support\Facades\Auth;
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

// Page pour creer un compte User
Route::get('/register/user', [AuthController::class, 'createUserAccount'])->name('register.user');
// Route d'enregistrement d'un User
Route::post('/create/user', [AuthController::class, 'storeUser'])->name('create.user');

// Page pour creer un compte Association
Route::get('/register/association', [AuthController::class, 'createAssociationAccount'])->name('register.Association');
// Route d'enregistrement Association
Route::post('/create/association', [AuthController::class, 'storeAssociation'])->name('create.Association');

// Page de Login
Route::get('/login', [AuthController::class, 'login'])->name('login.authentification');
Route::post('/authentification', [AuthController::class, 'authentification'])->name('authentification');

// Page Welcome
Route::get('/welcome', function(){
    return view('welcome');
})->middleware('auth:association')->name('welcome');

Route::get('/logout', function(){
    Auth::guard('association')->logout();
    return redirect('/login');
});

// Formulaire Ajout d'un evenement
Route::get('/ajout/evenement', [EvenementController::class, 'create'])->name('evenement.create');
// Creation d'un Evenement
Route::post('/store/evenement', [EvenementController::class, 'store'])->middleware('auth:association')->name('evenement.store');

// Page presentation qui liste les evenements d'une associations
Route::get('/association/evenement/liste', [EvenementController::class, 'index'])->name('evenement.list');

// Page presentation detail d'un evenements
Route::get('/evenement/detail/{evenement}', [EvenementController::class, 'show'])->name('evenement.detail');

// Formulaire de Modification d'un evenement
Route::get('/evenement/{evenement}', [EvenementController::class, 'edit'])->name('evenement.edit');
// Route::get('/evenement/modifier/{evenement}', [EvenementController::class, 'edit'])->name('modifier');
// Modification d'un Evenement
Route::post('/evenement/modifier/{evenement}', [EvenementController::class, 'update'])->name('evenement.update');
// Supprimer d'un Evenement
Route::get('/evenement/modifier/{evenement}', [EvenementController::class, 'destroy'])->name('evenement.destroy');

// Partie reservé aux Reservation

// Listing des reservations
Route::get('/evenements',[ClientController::class, 'index'])->name('client.evenements.liste');
// Formulaire de reservation
Route::get('/reservation/evenement/{evenement}',[ClientController::class, 'createReservation'])->name('client.reservation.form');
// Formulaire de reservation
Route::post('/confirmation/reservation/evenement',[ClientController::class, 'storeReservation'])->name('client.reservation.confirmation');