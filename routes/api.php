<?php

use App\Http\Controllers\AlarmController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TransactionController;
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

Route::get('/notes', [NoteController::class, 'index']);
Route::get('/reminders', [ReminderController::class, 'index']);
Route::get( '/tasks', [TaskController::class, 'index']);
Route::get('/balances', [BalanceController::class, 'index']);
Route::get('/transactions', [TransactionController::class, 'index']);
Route::get('/calendar', [CalendarController::class, 'index']);
Route::get('/alarms', [AlarmController::class, 'index']);
