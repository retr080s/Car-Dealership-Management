<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    public $table = 'vehicles_data';

    protected $fillable = ['make', 'model', 'year', 'fuel', 'mileage', 'price', 'vin', 'lotNumber'];
}
