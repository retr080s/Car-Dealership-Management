<?php

use App\Models\Vehicles;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementController;

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


// Home page
Route::get('/', [ManagementController::class, 'index']);

// Vehicles page
Route::get('/vehicles', [ManagementController::class, 'vehicles']);

// Add a vehicle
Route::get('/add-vehicle', [ManagementController::class, 'addVehicle']);

// Add a vehicle form
Route::post('/add-vehicle', [ManagementController::class, 'addVehicleForm']);

// Add a task
Route::get('/task', [ManagementController::class, 'addTask']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
