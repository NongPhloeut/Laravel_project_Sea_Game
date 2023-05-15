<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\EventSportController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users',[UserController::class,'index']);
Route::get('/users/{id}',[UserController::class,'show']);
Route::post('/users',[UserController::class,'store']);
Route::put('/users/{id}',[UserController::class,'update']);
Route::delete('/users/{id}',[UserController::class,'destroy']);

// venue
Route::get('/venues',[VenueController::class,'index']);
Route::get('/venue/{id}',[VenueController::class,'show']);
Route::post('/venues',[VenueController::class,'store']);
Route::put('/venues/{id}',[VenueController::class,'update']);
Route::delete('/venues/{id}',[VenueController::class,'destroy']);

// sport
Route::get('/sports',[SportController::class,'index']);
Route::get('/sports/{id}',[SportController::class,'show']);
Route::post('/sports',[SportController::class,'store']);
Route::put('/sports/{id}',[SportController::class,'update']);
Route::delete('/sports/{id}',[SportController::class,'destroy']);

//team
Route::get('/teams',[TeamController::class,'index']);
Route::get('/teams/{id}',[TeamController::class,'show']);
Route::delete('/teams/{id}',[TeamController::class,'destroy']);
Route::post('/teams',[TeamController::class,'store']);

//event
Route::get('/events',[EventsController::class,'index']);
Route::get('/events/{id}',[EventsController::class,'show']);
Route::put('/events/{id}',[EventsController::class,'update']);
Route::post('/events',[EventsController::class,'store']);
Route::delete('/events/{id}',[EventsController::class,'destroy']);
    
//bookings
Route::get('/bookings',[BookingController::class,'index']);
Route::get('/bookings/{id}',[BookingController::class,'show']);
Route::post('/bookings',[BookingController::class,'store']);
Route::delete('/bookings/{id}',[BookingController::class,'destroy']);

//event sport
Route::get('/event_sports',[EventSportController::class,'index']);
Route::get('/event_sport/{id}',[EventSportController::class,'show']);
Route::post('/event_sports',[EventSportController::class,'store']);


//ticket
Route::get('/tickets',[TicketController::class,'index']);
Route::get('/tickets/{id}',[TicketController::class,'show']);
// Route::post('/tickets',[TicketController::class,'store']);