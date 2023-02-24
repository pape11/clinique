<?php

use App\Models\presentation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RVController;
use App\Http\Controllers\MG_Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PediaController;
use App\Http\Controllers\CardioController;
use App\Http\Controllers\GynecoController;
use App\Http\Controllers\DiabetoController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ConsultationController;


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

Route::get('/', function () {
    $listes = presentation::paginate(1);
    return view('pages.welcome',[
        'listes' => $listes
    ]);
})->name('welcome');

Route::get('/listes-patients',[PatientController::class, 'index'])->name('listes-patients');
Route::get('/ajout-patient',[PatientController::class, 'create'])->name('ajout-patient');
Route::post('/ajout-patient',[PatientController::class, 'store'])->name('ajout-patient');
Route::get('/supprimer-patient/{id}',[PatientController::class, 'destroy'])->name('supprimer-patient');
Route::get('/modifier-patien/{id}',[PatientController::class, 'edit'])->name('modifier-patien');
Route::get('/dossier-medical/{id}',[PatientController::class, 'show'])->name('dossier-medical');

Route::post('/modifier-patient',[MG_Controller::class, 'update'])->name('modifier-patient');
Route::post('/recherche',[MG_Controller::class, 'show'])->name('recherche');
Route::get('/espace-medecin-generale',[MG_Controller::class, 'index'])->middleware('MG')->name('espace-medecin-generale');

Route::post('/save-consultation',[ConsultationController::class, 'store'])->name('save-consultation');

Route::get('/ajout-rendez-vous/{id}',[RVController::class, 'create'])->middleware('Access')->name('ajout-rendez-vous');
Route::post('/save-rendez-vous',[RVController::class, 'store'])->middleware('Access')->name('save-rendez-vous');
Route::get('/liste-rendez-vous',[RVController::class, 'index'])->name('liste-rendez-vous');
Route::post('/recherche-rendez-vous',[RVController::class, 'show'])->middleware('Access')->name('recherche-rendez-vous');
Route::get('/infos-rendez-vous/{id}',[RVController::class, 'infos'])->middleware('Access')->name('infos-rendez-vous');
Route::get('/rendez-vous/{id}',[RVController::class, 'voir'])->middleware('Access')->name('rendez-vous');

Route::get('/liste-emploi-temps',[HomeController::class, 'index'])->middleware('Access')->name('liste-emploi-temps');
Route::post('/ajout-emploi-temps',[HomeController::class, 'store'])->middleware('Access')->name('ajout-emploi-temps');
Route::get('/voir-emploi-temps/{id}',[HomeController::class, 'show'])->name('voir-emploi-temps');

Route::post('/cardio/recherche',[CardioController::class, 'show'])->name('cardio.recherche');
Route::get('/espace-cardio',[CardioController::class, 'index'])->middleware('Cardio')->name('espace-cardio');
Route::get('/cardio-rendez-vous',[CardioController::class, 'RV'])->name('cardio-rendez-vous');
Route::post('/recherche-cardio',[CardioController::class, 'recherche'])->middleware('Access')->name('recherche-cardio');

Route::post('/diabeto/recherche',[DiabetoController::class, 'show'])->name('diabeto.recherche');
Route::get('/espace-diabeto',[DiabetoController::class, 'index'])->middleware('Access')->name('espace-diabeto');
Route::get('/diabeto-rendez-vous',[DiabetoController::class, 'RV'])->name('diabeto-rendez-vous');
Route::post('/recherche-diabeto',[DiabetoController::class, 'recherche'])->middleware('Access')->name('recherche-diabeto');

Route::post('/gyneco/recherche',[GynecoController::class, 'show'])->name('gyneco.recherche');
Route::get('/espace-gyneco',[GynecoController::class, 'index'])->middleware('Access')->name('espace-gyneco');
Route::get('/gyneco-rendez-vous',[GynecoController::class, 'RV'])->name('gyneco-rendez-vous');
Route::post('/recherche-gyneco',[GynecoController::class, 'recherche'])->middleware('Access')->name('recherche-gyneco');

Route::post('/pedia/recherche',[PediaController::class, 'show'])->name('pedia.recherche');
Route::get('/espace-pedia',[PediaController::class, 'index'])->middleware('Access')->name('espace-pedia');
Route::get('/pedia-rendez-vous',[PediaController::class, 'RV'])->name('pedia-rendez-vous');
Route::post('/recherche-pedia',[PediaController::class, 'recherche'])->middleware('Access')->name('recherche-pedia');

Auth::routes();


