<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('app_home');

Route::get('/about', [HomeController::class, 'about'])
->name('app_about');

Route::match(['get','post'], '/dashboard', [HomeController::class, 'dashboard'])
->middleware('auth')
->name('app_dashboard');

Route::get('/logout',[LoginController::class, 'logout'])
    ->name('app_logout');

Route::post('/exist_email', [LoginController::class, 'existEmail'])
->name('app_exist_email');
Route::get('/update_etudiant/{id}', [EtudiantController::class,'update_etudiants']);
Route::get('/delete_etudiant/{id}', [EtudiantController::class,'delete_etudiants']);
Route::get('/etudiant', [EtudiantController::class,'liste_etudiant']);
Route::get('/dashboard', [EtudiantController::class,'liste_etudiant']);
Route::get('/ajouter', [EtudiantController::class,'ajouter_etudiant']);
Route::get('/ajouter/traitement', [EtudiantController::class,'ajouter_etudiant_traitement']);
Route::get('/update/traitement', [EtudiantController::class,'update_etudiant_traitement']);
Route::get('/filiere', [FiliereController::class,'ajout_filiere']);
Route::get('/ajout_filiere/traitement', [FiliereController::class,'ajout_filiere_traitement']);
Route::get('/update_filiere/{id}', [FiliereController::class,'update_filiere']);
Route::get('/delete_filiere/{id}', [FiliereController::class,'delete_filiere']);
Route::get('/update/traitement', [FiliereController::class,'update_filiere_traitement']);