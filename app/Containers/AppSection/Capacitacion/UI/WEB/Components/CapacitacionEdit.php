<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use App\Containers\AppSection\Capacitacion\Models\Capacitacion;
use App\Containers\AppSection\Capacitacion\Traits\CapacitacionComputedAttributesTrait;
use App\Containers\AppSection\Capacitacion\UI\WEB\Forms\CapacitacionForm;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Capacitaciones')]
class CapacitacionEdit extends Component
{
    use CapacitacionComputedAttributesTrait;
    public CapacitacionForm $form;

    public $selected_tab;
    public $costo_id;

    public function mount(Capacitacion $capacitacion)
    {
        $this->selected_tab = 'datos-generales';
        $this->form->setCapacitacion($capacitacion);
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

    public function render()
    {
        return view('appSection@capacitacion::capacitacion-edit');
    }
}