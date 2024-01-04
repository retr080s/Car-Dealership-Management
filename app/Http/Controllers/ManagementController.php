<?php

namespace App\Http\Controllers;

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
}
