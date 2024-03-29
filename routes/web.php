<?php

use App\Models\Vehicles;
use App\Models\Tasks;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementController;
use Illuminate\Database\Capsule\Manager;


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

// ****** Home ******
// Home page + Showing tasks
Route::get('/', [ManagementController::class, 'index']);

// ****** Vehicles ******
// Vehicles page
Route::get('/vehicles', [ManagementController::class, 'vehicles']);
// Add a vehicle page
Route::get('/add-vehicle', [ManagementController::class, 'addVehicle']);
// Add a vehicle form
Route::post('/add-vehicle', [ManagementController::class, 'addVehicleForm']);
// Edit vehicle form
Route::get('/vehicles/edit-vehicle/{id}', [ManagementController::class, 'edit'])->name('vehicles.edit-vehicle');
// Updates the data in the form
Route::put('/vehicles/edit-vehicle/{id}', [ManagementController::class, 'update'])->name('vehicles.edit-vehicle.update');


// ****** Task ******
// Add task page
Route::get('/task', [ManagementController::class, 'addTask']);
// Add a task form
Route::post('/task', [ManagementController::class, 'addTaskForm']);
// Delete task
Route::delete('/{id}', [ManagementController::class, 'deleteTask'])->name('delete-task');

// ****** Inventory ******
// Inventory page
Route::get('/inventory', [ManagementController::class, 'inventory']);
// Change location
Route::get('/inventory/vehicle-location', [ManagementController::class, 'inventoryChangeLocation']);
// Change location Form
Route::post('/inventory/vehicle-location', [ManagementController::class, 'inventoryChangeLocationForm']);
// Delete inventory form
Route::delete('/inventory/{id}', [ManagementController::class, 'inventoryDelete'])->name('delete-inventory');



// ****** Auth ******
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
