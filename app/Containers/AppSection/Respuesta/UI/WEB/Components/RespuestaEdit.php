<?php

namespace App\Containers\AppSection\Respuesta\UI\WEB\Components;

use App\Containers\AppSection\Respuesta\Models\Respuesta;
use App\Containers\AppSection\Respuesta\UI\WEB\Forms\RespuestaForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class RespuestaEdit extends Component
{
    public RespuestaForm $form;

    public function mount(Respuesta $respuesta)
    {
        $this->form->setRespuesta($respuesta);
    }

    public function render()
    {
        return view('appSection@respuesta::respuesta-edit');
    }

    public function update()
    {
        $this->form->update();
        Notification::make()
            ->title('Actualizado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/respuestas', true);
    }
}