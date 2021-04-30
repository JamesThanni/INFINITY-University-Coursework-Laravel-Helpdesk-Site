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

Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/dashboard', [EmployeeController::class, 'index']);
Route::get('/employee/FAQ', [EmployeeController::class, 'loadFAQPage']);
Route::get('/employee/tickets', [EmployeeController::class, 'loadTicketsPage']);

Route::get('/analyst', [AnalystController::class, 'index']);
Route::get('/analyst/dashboard', [AnalystController::class, 'index']);

Route::get('/specialist', [SpecialistController::class, 'index']);
Route::get('/specialist/dashboard', [SpecialistController::class, 'index']);
Route::get('/specialist/FAQ', [SpecialistController::class, 'loadFAQPage']);
Route::get('/specialist/edit', [SpecialistController::class, 'loadEditPage']);
Route::post('/specialist/edit/add-hardware', [SpecialistController::class, 'addHardware']);

