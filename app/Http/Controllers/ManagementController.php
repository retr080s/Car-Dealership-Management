<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\Vehicles;
use App\Models\Tasks;

class ManagementController extends Controller
{
    // Home page + Shows all tasks
    public function index() {
        $task = Tasks::all();
        return view('index', compact('task'));
    }

    // Vehicles page
    public function vehicles() {
        return view('vehicles');
    }

    // Add a vehicle page
    public function addVehicle() {
        return view('vehicles.add-vehicle');
    }

    // Add vehicle form (POST REQ)
    public function addVehicleForm(){
        Vehicles::create([
            'make' => request('make'),
            'model' => request('model'),
            'year' => request('year'),
            'fuel' => request('fuel'),
            'mileage' => request('mileage'),
            'price' => request('price'),
            'vin' => request('vin'),
            'lotNumber' => request('lotNumber'),
        ]);
        return redirect('vehicles');
    }

    // Edit vehicle
    public function edit($id) {
        $vehicle = Vehicles::findOrFail($id);
        return view('vehicles.edit-vehicle', compact('vehicle'));
    }

    // Update vehicle
    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'fuel' => 'required',
            'mileage' => 'required',
            'price' => 'required',
            'vin' => 'required',
            'lotNumber' => 'required',
        ]);

        $vehicle = Vehicles::findOrFail($id);
        $vehicle->update($validateData);

        return redirect('/vehicles');
    }

    // Add a task page
    public function addTask() {
        return view('task');
    }

    // Add a task from
    public function addTaskForm() {
        Tasks::create([
            'task' => request('task'),
        ]);
        return redirect('/');
    }

    // Delete a task
    public function deleteTask($id) {
        $task = Tasks::findOrFail($id);
        $task->delete();
        return redirect('/');
    }

    // Inventory management
    public function inventory() {
        $invinfo = Inventory::all();
        return view('inventory', compact('invinfo'));
    }

    // Inventory change location
    public function inventoryChangeLocation() {
        return view('inventory.change-location');
    }

    // Inventory change location form
    public function inventoryChangeLocationForm() {
        Inventory::create([
            'currentLocation' => request('currentLocation'),
            'lotNumber' => request('lotNumber'),
        ]);
        return redirect('/inventory');
    }

    // Inventory delete info
    public function inventoryDelete($id) {
        $invinfo = Inventory::findOrFail($id);
        $invinfo->delete();
        return redirect('/inventory');
    }
}
