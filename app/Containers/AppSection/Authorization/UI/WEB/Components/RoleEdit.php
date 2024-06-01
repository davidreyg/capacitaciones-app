<?php

namespace App\Containers\AppSection\Authorization\UI\WEB\Components;

use App\Containers\AppSection\Authorization\Models\Role;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Component;

class RoleEdit extends Component implements HasForms
{
    use InteractsWithForms;

    public Role $role;
    public ?array $data = [];

    public function mount(Role $role): void
    {
        $this->form->fill($role->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'default' => 1,
                    'sm' => 2,
                    'md' => 2,
                ])
                    ->schema([
                        // ...
                        TextInput::make('name')
                            ->required()->live(true),
                        Select::make('guard_name')
                            ->options(['web' => 'web', 'api' => 'api'])
                            ->required()->live(true),
                        TextInput::make('display_name')->live(true),
                        TextInput::make('description')->live(true),
                    ])
            ])
            ->statePath('data')
            ->model($this->role);
    }

    public function update(): void
    {
        $data = $this->form->getState();

        $this->role->update($data);

        Notification::make()
            ->title('Actualizado Correctamente.')
            ->success()
            ->send();
        $this->redirect('/roles', true);

    }

    public function render()
    {
        return view('appSection@authorization::role-edit');
    }
}