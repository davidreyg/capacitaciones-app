<?php

namespace App\Containers\AppSection\Establecimiento\UI\WEB\Components;

use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class EstablecimientoTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Establecimiento::query())
            ->columns([
                TextColumn::make('nombre')->searchable(),
                TextColumn::make('codigo')->searchable(),
                TextColumn::make('direccion')->searchable(),
                TextColumn::make('telefono')->searchable(),
                TextColumn::make('ris')->searchable(),
                IconColumn::make('has_lab')
                    ->boolean()
                    ->sortable()
                    ->label('¿Laboratorio?')
                    ->alignCenter(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('edit')
                        ->label('Editar')
                        ->icon('heroicon-o-pencil')
                        ->color('warning')
                        ->url(fn(Establecimiento $record): string => route('establecimientos.edit', $record)),
                    ViewAction::make()->form([
                        Grid::make([
                            'default' => 1,
                            'sm' => 2,
                            'md' => 3,
                            'lg' => 3,
                            'xl' => 3,
                            '2xl' => 3,
                        ])->schema([
                                    TextInput::make('nombre')
                                        ->required()
                                        ->maxLength(255),
                                    TextInput::make('nombre'),
                                    TextInput::make('codigo'),
                                    TextInput::make('direccion'),
                                    TextInput::make('telefono'),
                                    TextInput::make('ris'),
                                    Checkbox::make('has_lab')->label('¿Laboratorio?'),
                                ])
                    ])->label('Ver')->color('info'),
                    DeleteAction::make(),

                ])->color('info')
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function render(): View
    {
        return view('appSection@establecimiento::establecimiento-table');
    }
}