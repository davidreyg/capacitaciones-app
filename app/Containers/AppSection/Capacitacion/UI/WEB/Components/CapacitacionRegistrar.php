<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;


use Filament\Notifications\Notification;
use Livewire\Attributes\Title;

#[Title('Registrar Capacitación')]
class CapacitacionRegistrar extends CapacitacionCreate
{

    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Registrado Correctamente.')
            ->success()
            ->seconds(2)
            ->send();
        return $this->redirect('/buscar-capacitaciones', true);
    }

    public function render()
    {
        return view('appSection@capacitacion::capacitacion-registrar');
    }
}