<?php

namespace App\Containers\AppSection\TipoCapacitacion\UI\WEB\Components;

use App\Containers\AppSection\TipoCapacitacion\Models\TipoCapacitacion;
use App\Containers\AppSection\TipoCapacitacion\UI\WEB\Forms\TipoCapacitacionForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class TipoCapacitacionEdit extends Component
{
    public TipoCapacitacionForm $form;

    public function mount(TipoCapacitacion $tipoCapacitacion)
    {
        $this->form->setTipoCapacitacion($tipoCapacitacion);
    }

    public function render()
    {
        return view('appSection@tipoCapacitacion::tipo-capacitacion-edit');
    }

    public function update()
    {
        $this->form->update();
        Notification::make()
            ->title('Actualizado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/tipo-capacitaciones', true);
    }
}