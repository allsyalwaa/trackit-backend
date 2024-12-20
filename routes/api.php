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
Route::post('/notes', [NoteController::class, 'store']);
Route::get('/notes/{note}', [NoteController::class, 'show']);
Route::put('/notes/{note}', [NoteController::class, 'update']);
Route::delete('/notes/{note}', [NoteController::class, 'destroy']);
Route::get('/notes/binding/{note:title}', [NoteController::class, 'showBinding']);

Route::get('/reminders', [ReminderController::class, 'index']);
Route::post('/reminders', [ReminderController::class, 'store']);
Route::get('/reminders/{reminder}', [ReminderController::class, 'show']);
Route::put('/reminders/{reminder}', [ReminderController::class, 'update']);
Route::delete('/reminders/{reminder}', [ReminderController::class, 'destroy']);
Route::get('/reminders/binding/{reminder:title}', [ReminderController::class, 'showBinding']);

Route::get( '/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{task}', [TaskController::class, 'show']);
Route::put('/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus']);
Route::get('/tasks/binding/{task:title}', [TaskController::class, 'showBinding']);

Route::get('/balances', [BalanceController::class, 'index']);
Route::post('/balances', [BalanceController::class, 'store']);
Route::get('/balances/{balance}', [BalanceController::class, 'show']);
Route::put('/balances/{balance}', [BalanceController::class, 'update']);
Route::patch('/balances/{balance}/amount', [BalanceController::class, 'addAmount']);
Route::delete('/balances/{balance}', [BalanceController::class, 'destroy']);
Route::get('/balances/binding/{balance:title}', [BalanceController::class, 'showBinding']);

Route::get('/transactions', [TransactionController::class, 'index']);
Route::post('/transactions', [TransactionController::class, 'store']);
Route::get('/transactions/{transaction}', [TransactionController::class, 'show']);
Route::put('/transactions/{transaction}', [TransactionController::class, 'update']);
Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy']);
Route::get('/transactions/binding/{transaction:title}', [TransactionController::class, 'showBinding']);

Route::get('/calendar', [CalendarController::class, 'index']);
Route::post('/calendar', [CalendarController::class, 'store']);
Route::get('/calendar/{date}', [CalendarController::class, 'show']);
Route::put('/calendar/{date}', [CalendarController::class, 'update']);
Route::delete('/calendar/{date}', [CalendarController::class, 'destroy']);
Route::get('/calendar/binding/{date:title}', [CalendarController::class, 'showBinding']);

Route::get('/alarms', [AlarmController::class, 'index']);
Route::post('/alarms', [AlarmController::class, 'store']);
Route::get('/alarms/{alarm}', [AlarmController::class, 'show']);
Route::put('/alarms/{alarm}', [AlarmController::class, 'update']);
Route::delete('/alarms/{alarm}', [AlarmController::class, 'destroy']);
Route::get('/alarms/binding/{alarm:name}', [AlarmController::class, 'showBinding']);
