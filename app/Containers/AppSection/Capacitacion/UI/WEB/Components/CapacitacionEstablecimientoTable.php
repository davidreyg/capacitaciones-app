<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use App\Containers\AppSection\Capacitacion\Models\Capacitacion;
use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Livewire\Component;

class CapacitacionEstablecimientoTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public Establecimiento $establecimiento;

    public function mount()
    {
        $this->establecimiento = auth()->user()->establecimiento;
    }

    public function table(Table $table): Table
    {
        return $table
            ->relationship(fn(): BelongsToMany => $this->establecimiento->capacitaciones()
                ->wherePivot('estado', config('appSection-capacitacion.estado_establecimiento.APROBADO.nombre')))
            ->inverseRelationship('establecimientos')
            ->columns([
                TextColumn::make('nombre'),
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
                    ->requiresConfirmation()
                    ->modalHeading('Habilitar Capacitación'),
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