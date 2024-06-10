<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use App\Containers\AppSection\Capacitacion\Models\Capacitacion;
use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Livewire\Component;

class CapacitacionEstablecimientoChildrenTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public Establecimiento $establecimiento;

    public function mount(Establecimiento $establecimientoId)
    {
        $this->establecimiento = $establecimientoId;
    }

    public function table(Table $table): Table
    {
        return $table
            ->relationship(fn(): BelongsToMany => $this->establecimiento->capacitacions()
                ->wherePivot('estado', config('appSection-capacitacion.estado_establecimiento.APROBADO.nombre')))
            ->inverseRelationship('establecimientos')
            ->columns([
                TextColumn::make('nombre'),
                TextColumn::make('fecha_inicio')->date(),
                TextColumn::make('fecha_fin')->date(),
                TextColumn::make('pivot.estado')->label('Estado'),
            ])
            ->actions([
                Action::make('habilitar')
                    ->label('Habilitar')
                    ->icon(config('appSection-capacitacion.estado_establecimiento.HABILITADO.filament_icon'))
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (Capacitacion $record) {
                        $record->establecimientos()->updateExistingPivot($this->establecimiento->id, ['estado' => config('appSection-capacitacion.estado_establecimiento.HABILITADO.nombre')]);
                    })
            ])->bulkActions([
                    BulkActionGroup::make([
                        BulkAction::make('habilitar2')
                            ->label('Habilitar todos')
                            ->icon(config('appSection-capacitacion.estado_establecimiento.HABILITADO.filament_icon'))
                            ->color('success')
                            ->action(function (Collection $collection) {
                                foreach ($collection as $value) {
                                    $value->establecimientos()->updateExistingPivot($this->establecimiento->id, ['estado' => config('appSection-capacitacion.estado_establecimiento.HABILITADO.nombre')]);
                                }
                            })
                            ->requiresConfirmation()
                            ->deselectRecordsAfterCompletion()
                            ->databaseTransaction(),
                    ]),
                ])
            ->deferLoading();
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