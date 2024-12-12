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
Route::get('/notes/{note}', [NoteController::class, 'show']);
Route::get('/notes/binding/{note:title}', [NoteController::class, 'showBinding']);
Route::get('/reminders', [ReminderController::class, 'index']);
Route::get('/reminders/{reminder}', [ReminderController::class, 'show']);
Route::get('/reminders/binding/{reminder:title}', [ReminderController::class, 'showBinding']);
Route::get( '/tasks', [TaskController::class, 'index']);
Route::get('/tasks/{task}', [TaskController::class, 'show']);
Route::get('/tasks/binding/{task:title}', [TaskController::class, 'showBinding']);
Route::get('/balances', [BalanceController::class, 'index']);
Route::get('/balances/{balance}', [BalanceController::class, 'show']);
Route::get('/balances/binding/{balance:title}', [BalanceController::class, 'showBinding']);
Route::get('/transactions', [TransactionController::class, 'index']);
Route::get('/transactions/{transaction}', [TransactionController::class, 'show']);
Route::get('/transactions/binding/{transaction:title}', [TransactionController::class, 'showBinding']);
Route::get('/calendar', [CalendarController::class, 'index']);
Route::get('/calendar/{date}', [CalendarController::class, 'show']);
Route::get('/calendar/binding/{date:title}', [CalendarController::class, 'showBinding']);
Route::get('/alarms', [AlarmController::class, 'index']);
Route::get('/alarms/{alarm}', [AlarmController::class, 'show']);
Route::get('/alarms/binding/{alarm:name}', [AlarmController::class, 'showBinding']);
