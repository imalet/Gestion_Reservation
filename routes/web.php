<?php

use App\Http\Controllers\AuthController;
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