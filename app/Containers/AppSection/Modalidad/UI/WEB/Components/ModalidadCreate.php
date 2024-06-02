<?php

namespace App\Containers\AppSection\Modalidad\UI\WEB\Components;

use App\Containers\AppSection\Modalidad\UI\WEB\Forms\ModalidadForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class ModalidadCreate extends Component
{
    public ModalidadForm $form;

    public function render()
    {
        return view('appSection@modalidad::modalidad-create');
    }

    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Guardado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/modalidades', true);
    }
}