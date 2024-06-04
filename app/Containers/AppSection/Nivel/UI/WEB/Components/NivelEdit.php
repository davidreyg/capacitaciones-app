<?php

namespace App\Containers\AppSection\Nivel\UI\WEB\Components;

use App\Containers\AppSection\Nivel\Models\Nivel;
use App\Containers\AppSection\Nivel\UI\WEB\Forms\NivelForm;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Niveles de Evaluación')]
class NivelEdit extends Component
{
    public NivelForm $form;

    public function mount(Nivel $nivel)
    {
        $this->form->setNivel($nivel);
    }

    public function render()
    {
        return view('appSection@nivel::nivel-edit');
    }

    public function update()
    {
        $this->form->update();
        Notification::make()
            ->title('Actualizado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/niveles', true);
    }
}