<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use App\Containers\AppSection\Capacitacion\Models\Capacitacion;
use App\Containers\AppSection\Capacitacion\UI\WEB\Forms\CapacitacionForm;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Capacitaciones')]
class CapacitacionEdit extends Component
{
    public CapacitacionForm $form;

    public function mount(Capacitacion $Capacitacion)
    {
        $this->form->setCapacitacion($Capacitacion);
    }

    public function render()
    {
        return view('appSection@capacitacion::capacitacion-edit');
    }

    public function update()
    {
        $this->form->update();
        Notification::make()
            ->title('Actualizado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/capacitaciones', true);
    }
}