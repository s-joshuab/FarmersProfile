<?php

namespace App\Http\Livewire;

use App\Models\crops;
use App\Models\FarmersProfile;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class CropsTable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput()->withoutLoading(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {

        return Crops::query()
            ->join('farmersprofile', 'farmersprofile.id', '=', 'crops.farmersprofile_id')
            ->join('commodities', 'commodities.id', '=', 'crops.commodities_id')
            ->join('farmersnumber', 'farmersnumber.farmersprofile_id', '=', 'farmersprofile.id')
            ->join('barangays', 'barangays.id', '=', 'farmersprofile.barangays_id')
            ->select(
                'crops.*',
                'farmersprofile.fname',
                'farmersprofile.sname',
                'commodities.commodities',
                'farmersnumber.farmersnumber',
                'farmersprofile.status',
                'barangays.barangays' // Select the 'barangays' column from 'barangays' and give it an alias
            );


    }

    public function relationSearch(): array
    {
        return [
            'farmersProfile' => ['fname', 'sname', 'barangays', 'status'], // Use 'barangay_name' here
            'commodity' => ['commodities', 'category'],
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('farmersnumber.farmersnumber')
            ->addColumn('farmersprofile.fname')
            ->addColumn('farmersprofile.sname')
            ->addColumn('farmersprofile.barangays.barangays') // Display 'barangay_name' as 'Barangay'
            ->addColumn('commodities.commodities')
            ->addColumn('farm_size')
            ->addColumn('farmersprofile.status');
    }


    public function columns(): array
    {
        return [
            Column::make('Farmers Number', 'farmersnumber','farmersnumber.farmersnumber'),
            Column::make('First Name', 'farmersprofile.fname'),
            Column::make('Last Name', 'farmersprofile.sname'),
            Column::make('Barangays', 'barangays', 'barangays.barangays'), // Use 'barangay_name' here
            Column::make('Commodities', 'commodities', 'commodities.commodities')
                ->sortable()
                ->searchable(),
            Column::make('Farm size', 'farm_size')
                ->sortable()
                ->searchable(),
            Column::make('Farm location', 'farm_location')
                ->sortable()
                ->searchable(),
            Column::make('Status', 'farmersprofile.status'),
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('farm_size')->operators(['contains']),
            Filter::inputText('farm_location')->operators(['contains']),
        ];
    }

    public function fetchAllFarmersProfiles()
    {
        return FarmersProfile::all();
    }

}
