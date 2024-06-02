<?php

namespace App\Containers\AppSection\EjeTematico\UI\WEB\Components;

use App\Containers\AppSection\EjeTematico\UI\WEB\Forms\EjeTematicoForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class EjeTematicoCreate extends Component
{
    public EjeTematicoForm $form;

    public function render()
    {
        return view('appSection@ejeTematico::eje-tematico-create');
    }

    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Guardado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/ejes-tematicos', true);
    }
}