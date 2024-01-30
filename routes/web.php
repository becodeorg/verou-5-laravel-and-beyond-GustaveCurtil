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
Route::get('/create-event', [NavigationController::class, 'goToEventCreate']);
Route::get('/account', [NavigationController::class, 'goToAccount']);


Route::post('/create-event/create', [EventController::class, 'createEvent']);

//ACCOUNT LOG SYSTEM
Route::post('/account/create', [UserController::class, 'createAccount']);
Route::post('/account/login', [UserController::class, 'login']);
Route::post('/account/logout', [UserController::class, 'logout']);

//ACCOUNT EVENT SYSTEM
Route::get('/account/edit-event/{event}', [NavigationController::class, 'goToEventEdit']);
Route::put('/account/edit-event/{event}', [EventController::class, 'editEvent']);
Route::delete('/account/delete-event/{event}', [EventController::class, 'deleteEvent']);

