<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use App\Containers\AppSection\Capacitacion\Models\Capacitacion;
use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Livewire\Component;

class CapacitacionEstablecimientoChildrenTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public Establecimiento $establecimiento;

    public function mount(Establecimiento $establecimiento)
    {
        $this->establecimiento = $establecimiento;
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
                    ->action(function (Capacitacion $record) {
                        $record->establecimientos()->updateExistingPivot($this->establecimiento->id, ['estado' => config('appSection-capacitacion.estado_establecimiento.HABILITADO.nombre')]);
                    })
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