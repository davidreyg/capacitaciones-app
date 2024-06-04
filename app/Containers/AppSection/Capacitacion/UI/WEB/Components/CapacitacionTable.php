<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use App\Containers\AppSection\Capacitacion\Models\Capacitacion;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class CapacitacionTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Capacitacion::query())
            ->columns([
                TextColumn::make('nombre')->searchable(),
                TextColumn::make('codigo'),
            ])
            ->filters([
                //...
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('edit')
                        ->label('Editar')
                        ->icon('heroicon-o-pencil')
                        ->color('warning')
                        ->url(fn(Capacitacion $record): string => route('capacitaciones.edit', $record)),
                    DeleteAction::make()->databaseTransaction(),

                ])->color('info')
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->databaseTransaction(),
                ]),
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