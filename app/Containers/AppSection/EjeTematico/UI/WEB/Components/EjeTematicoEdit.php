<?php

namespace App\Containers\AppSection\EjeTematico\UI\WEB\Components;

use App\Containers\AppSection\EjeTematico\Models\EjeTematico;
use App\Containers\AppSection\EjeTematico\UI\WEB\Forms\EjeTematicoForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class EjeTematicoEdit extends Component
{
    public EjeTematicoForm $form;

    public function mount(EjeTematico $ejeTematico)
    {
        $this->form->setEjeTematico($ejeTematico);
    }

    public function render()
    {
        return view('appSection@ejeTematico::eje-tematico-edit');
    }

    public function update()
    {
        $this->form->update();
        Notification::make()
            ->title('Actualizado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/ejes-tematicos', true);
    }
}