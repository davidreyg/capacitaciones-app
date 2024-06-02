<?php

namespace App\Containers\AppSection\Oportunidad\UI\WEB\Components;

use App\Containers\AppSection\Oportunidad\Models\Oportunidad;
use App\Containers\AppSection\Oportunidad\UI\WEB\Forms\OportunidadForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class OportunidadEdit extends Component
{
    public OportunidadForm $form;

    public function mount(Oportunidad $oportunidad)
    {
        $this->form->setOportunidad($oportunidad);
    }

    public function render()
    {
        return view('appSection@oportunidad::oportunidad-edit');
    }

    public function update()
    {
        $this->form->update();
        Notification::make()
            ->title('Actualizado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/oportunidades', true);
    }
}