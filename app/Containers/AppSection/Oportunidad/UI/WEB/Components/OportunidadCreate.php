<?php

namespace App\Containers\AppSection\Oportunidad\UI\WEB\Components;

use App\Containers\AppSection\Oportunidad\UI\WEB\Forms\OportunidadForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class OportunidadCreate extends Component
{
    public OportunidadForm $form;

    public function render()
    {
        return view('appSection@oportunidad::oportunidad-create');
    }

    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Guardado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/oportunidades', true);
    }
}