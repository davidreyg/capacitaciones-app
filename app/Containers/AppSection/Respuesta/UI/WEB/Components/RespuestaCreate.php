<?php

namespace App\Containers\AppSection\Respuesta\UI\WEB\Components;

use App\Containers\AppSection\Respuesta\UI\WEB\Forms\RespuestaForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class RespuestaCreate extends Component
{
    public RespuestaForm $form;

    public function render()
    {
        return view('appSection@respuesta::respuesta-create');
    }

    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Guardado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/respuestas', true);
    }
}