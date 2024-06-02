<?php

namespace App\Containers\AppSection\TipoCapacitacion\UI\WEB\Components;

use App\Containers\AppSection\TipoCapacitacion\UI\WEB\Forms\TipoCapacitacionForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class TipoCapacitacionCreate extends Component
{
    public TipoCapacitacionForm $form;

    public function render()
    {
        return view('appSection@tipoCapacitacion::tipo-capacitacion-create');
    }

    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Guardado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/tipo-capacitaciones', true);
    }
}