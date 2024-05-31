<?php

namespace App\Ship\Livewire;

use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Blade;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Responsive;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class EstablecimientoTable extends PowerGridComponent
{
    use WithExport;

    public bool $deferLoading = true;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS),
            Header::make()->showSearchInput()->showToggleColumns(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
            Responsive::make()
        ];
    }

    public function datasource(): Builder
    {
        return Establecimiento::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            // ->add('id')
            ->add('nombre')

            /** Example of custom column using a closure **/
            ->add('nombre_lower', fn(Establecimiento $model) => strtolower(e($model->nombre)))

            ->add('codigo')
            ->add('direccion')
            ->add('telefono')
            ->add('ris')
            ->add('has_lab')
            ->add('has_lab_label', function ($row) {
                return $row->has_lab ? 'Si' : 'No'; // Yes/No
            });
    }

    public function columns(): array
    {
        return [
            // Column::make('Id', 'id'),
            Column::make('Nombre', 'nombre')
                ->sortable()
                ->searchable(),

            Column::make('Codigo', 'codigo'),
            Column::make('Direccion', 'direccion')
                ->sortable()
                ->searchable(),

            Column::make('Telefono', 'telefono'),
            Column::make('Ris', 'ris')
                ->sortable()
                ->searchable(),

            Column::make('¿Laboratorio?', 'has_lab_label'),

            Column::action('Action')->fixedOnResponsive()
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->redirect(route('establecimientos.edit', $rowId), true);
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($rowId): void
    {
        // dd('', $rowId);
        $this->dispatch('editarest', $rowId);
    }

    public function actions(Establecimiento $row): array
    {
        return [
            Button::add('custom')
                ->render(function ($establecimiento) {
                    return Blade::render(<<<HTML
                        <x-button icon="tabler.edit" tooltip="Editar" class="btn-outline btn-warning btn-sm btn-circle" wire:click="edit('$establecimiento->id')" />
                    HTML);
                }),
            Button::add('custom')
                ->render(function ($establecimiento) {
                    return Blade::render(<<<HTML
                        <x-button icon="tabler.trash" tooltip="Eliminar" class="btn-outline btn-error btn-sm btn-circle" wire:click="delete('$establecimiento->id')" />
                    HTML);
                }),
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
