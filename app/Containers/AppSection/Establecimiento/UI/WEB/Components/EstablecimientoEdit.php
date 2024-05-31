<?php

namespace App\Containers\AppSection\Establecimiento\UI\WEB\Components;

use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use App\Containers\AppSection\Establecimiento\UI\WEB\Forms\EstablecimientoForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class EstablecimientoEdit extends Component
{
    public EstablecimientoForm $form;

    public function mount(Establecimiento $establecimiento)
    {
        $this->form->setEstablecimiento($establecimiento);
    }

    public function render()
    {
        return view('appSection@establecimiento::establecimiento-edit');
    }

    public function update()
    {
        $this->form->update();
        Notification::make()
            ->title('Editado correctamente.')
            ->success()
            ->send();
        return $this->redirect('/establecimientos', true);
    }
}