<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
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
Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth:association')->name('welcome');

Route::get('/logout', function () {
    if (Auth::guard('association')->check()) {
        Auth::guard('association')->logout();
    } elseif(Auth::guard('web')->check()) {
        Auth::guard('web')->logout();
    }
    
    Auth::guard('association')->logout();
    return redirect('/login');
});

// Formulaire Ajout d'un evenement
Route::get('/ajout/evenement', [EvenementController::class, 'create'])->middleware('auth:association')->name('evenement.create');
// Creation d'un Evenement
Route::post('/store/evenement', [EvenementController::class, 'store'])->middleware('auth:association')->name('evenement.store');

// Page presentation qui liste les evenements des associations
Route::get('/association/evenement/liste', [EvenementController::class, 'index'])->name('evenement.list');
// Route::get('/association/evenement/liste', [EvenementController::class, 'index'])->name('evenement.list');

// Page presentation detail d'un evenements
Route::get('/evenement/detail/{evenement}', [EvenementController::class, 'show'])->name('evenement.detail');

// Formulaire de Modification d'un evenement
Route::get('/evenement/{evenement}', [EvenementController::class, 'edit'])->middleware('auth:association')->name('evenement.edit');
// Route::get('/evenement/modifier/{evenement}', [EvenementController::class, 'edit'])->name('modifier');
// Modification d'un Evenement
Route::post('/evenement/modifier/{evenement}', [EvenementController::class, 'update'])->middleware('auth:association')->name('evenement.update');
// Supprimer d'un Evenement
Route::get('/evenement/supprimer/{evenement}', [EvenementController::class, 'destroy'])->middleware('auth:association')->name('evenement.destroy');

// Partie reservé aux action du client lies a une Reservation

// Listing des reservations
// Route::get('/evenements', [ClientController::class, 'index'])->name('client.evenements.liste');
Route::get('/', [ClientController::class, 'index'])->name('evenements.liste');
// Formulaire de reservation
Route::get('/reservation/evenement/{evenement}', [ClientController::class, 'createReservation'])->middleware('auth:web')->name('client.reservation.form');
// Formulaire de reservation
Route::post('/confirmation/reservation/evenement', [ClientController::class, 'storeReservation'])->middleware('auth:web')->name('client.reservation.confirmation');

// Partie reservé aux actions que peuvent faire les associations lies a une Reservation
Route::get('/association/reservations', [ReservationController::class, 'index'])->middleware('auth:association')->name('association.reservations.liste');
// Route permettant a une Association d'accepter ou de decliner une reservation
Route::get('/reservation/decline/{reservation}/{etat}', [ReservationController::class, 'update'])->middleware('auth:association')->name('association.reservation.update');
