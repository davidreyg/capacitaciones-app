<?php

namespace App\Containers\AppSection\Establecimiento\UI\WEB\Components;

use App\Containers\AppSection\Establecimiento\UI\WEB\Forms\EstablecimientoForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class EstablecimientoCreate extends Component
{
    public EstablecimientoForm $form;

    public function render()
    {
        return view('appSection@establecimiento::establecimiento-create');
    }

    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Guardado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/establecimientos', true);
    }
}