<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NavigationController;

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

Route::get('/', [NavigationController::class, 'goToHome']);
Route::get('/add-event', [NavigationController::class, 'goToEventform']);
Route::get('/account', [NavigationController::class, 'goToAccount']);


Route::post('/add-event', [EventController::class, 'create']);

//ACCOUNT 
Route::post('/account/create', [UserController::class, 'createAccount']);
Route::post('/account/login', [UserController::class, 'login']);
Route::post('/account/logout', [UserController::class, 'logout']);

