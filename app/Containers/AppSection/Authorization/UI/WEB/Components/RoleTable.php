<?php

namespace App\Containers\AppSection\Authorization\UI\WEB\Components;

use App\Containers\AppSection\Authorization\Models\Role;
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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Livewire\Component;

class RoleTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Role::query())
            ->columns([
                TextColumn::make('name')->label('Nombre')->searchable(),
                TextColumn::make('guard_name')
                    ->badge()
                    ->searchable()
                    ->color(fn(string $state): string => match ($state) {
                        'web' => 'success',
                        'api' => 'danger',
                    }),
            ])
            ->filters([
                SelectFilter::make('guard_name')
                    ->options([
                        'web' => 'web',
                        'api' => 'api',
                    ])
                    ->default('web')
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('edit')
                        ->label('Editar')
                        ->icon('heroicon-o-pencil')
                        ->color('warning')
                        ->url(fn(Role $record): string => route('roles.edit', $record)),
                    Action::make('edit')
                        ->label('Editar')
                        ->icon('heroicon-o-pencil')
                        ->color('warning')
                        ->url(fn(Role $record): string => route('roles.edit', $record)),
                    DeleteAction::make(),

                ])->color('info')
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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