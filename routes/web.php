<?php

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
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::post('/survey', [SurveyController::class, 'store'])->name('create-survey');
Route::get('/survey', [SurveyController::class, 'index'])->name('show-create');
Route::get('/survey/edit/{id}', [SurveyController::class, 'edit'])->name('edit-survey');
Route::get('/survey/delete/{id}', [SurveyController::class, 'destroy'])->name('delete-survey');
Route::post('/survey/update/{id}', [SurveyController::class, 'update'])->name('survey-up');

require __DIR__ . '/auth.php';
