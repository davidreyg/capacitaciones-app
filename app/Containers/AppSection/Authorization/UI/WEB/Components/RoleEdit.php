<?php

namespace App\Containers\AppSection\Authorization\UI\WEB\Components;

use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\UI\WEB\Forms\RoleForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class RoleEdit extends Component
{
    public RoleForm $form;

    public function mount(Role $role)
    {
        $this->form->setRole($role);
    }

    public function update()
    {
        $this->form->update();
        Notification::make()
            ->title('Actualizado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/roles', true);
    }

    public function render()
    {
        return view('appSection@authorization::role-edit');
    }
}