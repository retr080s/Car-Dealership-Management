<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class VehiclesTable extends DataTableComponent
{
    protected $model = Vehicles::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    // Delete function per row
    public function delete($id) {
        $vehicle = Vehicles::findOrFail($id);
        $vehicle->delete();
    }

    // Edit function
    public function edit($id) {
        $vehicle = Vehicles::findOrFail($id);
        return redirect()->route('vehicles.edit-vehicle', $vehicle->id);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Make", "make")
                ->sortable()
                ->searchable(),
            Column::make("Model", "model")
                ->sortable()
                ->searchable(),
            Column::make("Year", "year")
                ->sortable()
                ->searchable(),
            Column::make("Fuel", "fuel")
                ->sortable()
                ->searchable(),
            Column::make("Mileage", "mileage")
                ->sortable()
                ->searchable(),
            Column::make("Price", "price")
                ->sortable()
                ->searchable(),
            Column::make("Vin", "vin")
                ->sortable()
                ->searchable(),
            Column::make("Lot Number", "lotNumber")
                ->sortable()
                ->searchable(),
            // Column::make("Created at", "created_at")
                // ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            Column::make('Action')
                ->label(
                    fn ($row, Column $column) => view('components.livewire.datatables.action-column')->with([
                        'row' => $row,
                    ]))->html(),
            
        ];
    }
}
