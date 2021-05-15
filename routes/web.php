<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AnalystController;
use App\Http\Controllers\SpecialistController;

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

Route::get('/', [MainController::class, 'index']);
Route::get('/login', [MainController::class, 'index']);
Route::post('/login/user', [MainController::class, 'login']);
Route::get('/logout', [MainController::class, 'logout']);

Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/dashboard', [EmployeeController::class, 'index']);
Route::post('/employee/dashboard/add-ticket', [EmployeeController::class, 'addTicket']);
Route::get('/employee/FAQ', [EmployeeController::class, 'loadFAQPage']);
Route::get('/employee/tickets', [EmployeeController::class, 'loadTicketsPage']);
Route::get('/employee/tickets/unsolved', [EmployeeController::class, 'loadUnsolvedTickets']);
Route::get('/employee/tickets/solved', [EmployeeController::class, 'loadSolvedTickets']);
Route::get('/employee/tickets/pending', [EmployeeController::class, 'loadPendingTickets']);
Route::post('/employee/tickets/pending/deny', [EmployeeController::class, 'denyTicket']);
Route::post('/employee/tickets/pending/accept', [EmployeeController::class, 'acceptTicket']);

Route::get('/analyst', [AnalystController::class, 'index']);
Route::get('/analyst/dashboard', [AnalystController::class, 'index']);

Route::get('/specialist', [SpecialistController::class, 'index']);
Route::get('/specialist/dashboard', [SpecialistController::class, 'index']);
Route::get('/specialist/dashboard/unsolved', [SpecialistController::class, 'loadUnsolvedTickets']);
Route::get('/specialist/dashboard/solved', [SpecialistController::class, 'loadSolvedTickets']);
Route::get('/specialist/dashboard/pending', [SpecialistController::class, 'loadPendingTickets']);
Route::get('/specialist/FAQ', [SpecialistController::class, 'loadFAQPage']);
Route::get('/specialist/edit', [SpecialistController::class, 'loadEditPage']);
Route::post('/specialist/solve', [SpecialistController::class, 'loadSolvePage']);
Route::post('/specialist/solve/submit', [SpecialistController::class, 'submitSolution']);
Route::post('/specialist/reassign', [SpecialistController::class, 'loadReassignPage']);
Route::post('/specialist/edit/add-hardware', [SpecialistController::class, 'addHardware']);
Route::post('/specialist/edit/remove-hardware', [SpecialistController::class, 'removeHardware']);

