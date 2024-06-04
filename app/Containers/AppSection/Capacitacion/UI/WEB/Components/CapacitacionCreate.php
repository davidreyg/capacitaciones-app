<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use App\Containers\AppSection\Capacitacion\UI\WEB\Forms\CapacitacionForm;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Capacitaciones')]
class CapacitacionCreate extends Component
{
    public CapacitacionForm $form;
    public int $step;

    public function mount()
    {
        $this->step = 1;
    }

    public function next()
    {
        $this->step = $this->step + 1;
    }
    public function back()
    {
        $this->step--;

    }
    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Guardado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/capacitaciones', true);
    }

    public function render()
    {
        return view('appSection@capacitacion::capacitacion-create');
    }
}