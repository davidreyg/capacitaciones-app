<?php

namespace App\Containers\AppSection\Authorization\UI\WEB\Components;

use App\Containers\AppSection\Authorization\UI\WEB\Forms\RoleForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class RoleCreate extends Component
{
    public RoleForm $form;

    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Guardado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/roles', true);
    }

    public function render()
    {
        return view('appSection@authorization::role-create');
    }
}