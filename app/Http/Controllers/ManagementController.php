<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementController extends Controller
{
    //Home page
    public function index() {
        return view('index');
    }

    // Vehicles page
    public function vehicles() {
        return view('vehicles');
    }

    // Add a vehicle page
    public function addVehicle() {
        return view('vehicles.add-vehicle');
    }

    // Add a task page
    public function addTask() {
        return view('task');
    }
}
