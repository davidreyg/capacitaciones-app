<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use Illuminate\View\View;
use Livewire\Component;

class CapacitacionEstablecimientoTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public array $establecimiento_ids;

    public function mount()
    {
        $this->establecimiento_ids = auth()->user()->establecimiento->tipo === config('appSection-establecimiento.tipo_establecimiento.RIS')
            ? auth()->user()->establecimiento->children()->pluck('id')->toArray()
            : auth()->user()->establecimiento->childrenAndSelf()->pluck('id')->toArray();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Establecimiento::query()->whereHas('capacitacions', function ($query) {
                $query->whereIn('establecimiento_id', $this->establecimiento_ids)
                    ->where('capacitacion_establecimiento.estado', 'APROBADO');
            })->withCount([
                        'capacitacions' => function ($query) {
                            $query->whereIn('establecimiento_id', $this->establecimiento_ids)
                                ->where('capacitacion_establecimiento.estado', 'APROBADO');
                        }
                    ]))
            ->columns([
                TextColumn::make('nombre')->searchable(),
                TextColumn::make('capacitacions_count')->label('N° Capacitaciones'),
            ])
            ->filters([
            ])
            ->actions([
                Action::make('detalle')
                    ->label('Ver')
                    ->modalHeading('Capacitaciones del establecimiento')
                    ->modalContent(
                        fn(Establecimiento $record) =>
                        new HtmlString(\Blade::render("@livewire('capacitacion-capacitacion-establecimiento-children-table', ['establecimientoId' => {$record['id']}])"))
                    )
                    ->modalSubmitAction(false)
                    ->modalCancelAction(false)
                    ->modalWidth(MaxWidth::FiveExtraLarge),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            {{ $this->table }}
        </div>
        HTML;
    }

}