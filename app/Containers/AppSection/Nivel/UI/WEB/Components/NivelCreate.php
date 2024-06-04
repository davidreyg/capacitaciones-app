<?php

namespace App\Containers\AppSection\Nivel\UI\WEB\Components;

use App\Containers\AppSection\Nivel\UI\WEB\Forms\NivelForm;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Nivel de Evaluación')]
class NivelCreate extends Component
{
    public NivelForm $form;

    public function render()
    {
        return view('appSection@nivel::nivel-create');
    }
    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Guardado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/niveles', true);
    }
}