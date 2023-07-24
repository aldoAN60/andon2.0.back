<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\production_lineController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', [production_lineController::class,'index'])->name('index');
Route::get('/api/production_lines/{line_number}',[production_lineController::class,'index'])->name('index');
route::get('/api/dashboard-maintenance', [production_lineController::class, 'showAllLines'])->name('allLines');
route::get('/updateDates', [production_lineController::class, 'updateDates'])->name('updateDates');
route::get('/api/sendMail/{line_number}', [production_lineController::class, 'sendMail'])->name('sendMail');


Route::GET('/api/Andon-activation-update/{line_number}-{reason}', [production_lineController::class, 'andonActivationUpdate'])->name('andonActivation');

Route::get('/api/Andon-unactivation-update/{line_number}-{andonTime}',[production_lineController::class, 'andonUnactivationUpdate'])->name('andonUnactivation');

Route::get('/api/cumulative_stoppage_time/{line_number}', [production_lineController::class, 'getCST'])->name('getCST');
