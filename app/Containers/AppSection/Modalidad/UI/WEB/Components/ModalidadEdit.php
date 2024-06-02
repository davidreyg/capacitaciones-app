<?php

namespace App\Containers\AppSection\Modalidad\UI\WEB\Components;

use App\Containers\AppSection\Modalidad\Models\Modalidad;
use App\Containers\AppSection\Modalidad\UI\WEB\Forms\ModalidadForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class ModalidadEdit extends Component
{
    public ModalidadForm $form;

    public function mount(Modalidad $modalidad)
    {
        $this->form->setModalidad($modalidad);
    }

    public function render()
    {
        return view('appSection@modalidad::modalidad-edit');
    }

    public function update()
    {
        $this->form->update();
        Notification::make()
            ->title('Actualizado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/modalidades', true);
    }
}