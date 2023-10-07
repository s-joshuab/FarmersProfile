<?php

namespace App\Http\Livewire;

use App\Models\Crops;
use App\Models\FarmersNumber;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};
final class farmerstable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

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
        return FarmersNumber::query()
            ->join('farmersprofile', 'farmersnumber.farmersprofile_id', '=', 'farmersprofile.id')
            ->join('crops', 'farmersnumber.farmersprofile_id', '=', 'crops.farmersprofile_id')
            ->select(
                'farmersnumber.*',
                'farmersnumber.created_at',
                'farmersprofile.fname',
                'crops.farm_size',
                'crops.farm_location',
            );
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()

            ->addColumn('farmersnumber')
            ->addColumn('fname')
            ->addColumn('Crops')
            ->addColumn('Farm Size')
            ->addColumn('Farm Location')
            ->addColumn('farmersnumber_lower', fn (FarmersNumber $model) => strtolower(e($model->farmersnumber)));
    }

    public function columns(): array
    {
        return [
            Column::make('Farmersnumber', 'farmersnumber'),
            Column::make('farmersprofile.fname', 'fname'),
            Column::make('Crops', 'commodities_id', 'commodities.commodities')
                ->sortable()
                ->searchable(),
            Column::make('Farm Size', 'crops_id'),
            Column::make('Farm Location', 'crops_id')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('farmersnumber')->operators(['contains']),
            Filter::datetimepicker('created_at'),
        ];
    }

    // public function actions(): array
    // {
    //     return [
    //         Button::make('edit', 'Edit')
    //             ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
    //             ->route('farmers-number.edit', function(\App\Models\FarmersNumber $model) {
    //                 return $model->id;
    //             }),

    //         Button::make('destroy', 'Delete')
    //             ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
    //             ->route('farmers-number.destroy', function(\App\Models\FarmersNumber $model) {
    //                 return $model->id;
    //             })
    //             ->method('delete')
    //     ];
    // }

    // public function actionRules(): array
    // {
    //     return [
    //         Rule::button('edit')
    //             ->when(fn($farmers-number) => $farmers-number->id === 1)
    //             ->hide(),
    //     ];
    // }
}
