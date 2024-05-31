<?php

namespace App\Containers\AppSection\TipoDocumento\UI\WEB\Components;

use App\Containers\AppSection\TipoDocumento\Models\TipoDocumento;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TipoDocumentoTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(TipoDocumento::query())
            ->columns([
                TextColumn::make('nombre')->searchable(),
                TextColumn::make('digitos'),
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
                        ->url(fn(TipoDocumento $record): string => route('tipo-documentos.edit', $record)),
                    ViewAction::make()->form([
                        Grid::make([
                            'default' => 2,
                        ])->schema([
                                    TextInput::make('nombre'),
                                    TextInput::make('digitos'),
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

    public function render()
    {
        return <<<'HTML'
        <div>
            {{ $this->table }}
        </div>
        HTML;
    }
}