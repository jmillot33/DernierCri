<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FluxController;
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


Route::get('/', [FluxController::class, 'index']);
Route::get('/news/{id}', [FluxController::class, 'showSingle']);

//route des appels pour React
Route::post('/flux', [FluxController::class, 'flux']);
Route::post('/flux/{id}', [FluxController::class, 'fluxSingle']);