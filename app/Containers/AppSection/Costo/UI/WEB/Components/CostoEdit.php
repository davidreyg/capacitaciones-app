<?php

namespace App\Containers\AppSection\Costo\UI\WEB\Components;

use App\Containers\AppSection\Costo\Models\Costo;
use App\Containers\AppSection\Costo\UI\WEB\Forms\CostoForm;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Costos')]
class CostoEdit extends Component
{
    public CostoForm $form;

    public function mount(Costo $costo)
    {
        $this->form->setCosto($costo);
    }

    public function render()
    {
        return view('appSection@costo::costo-edit');
    }

    public function update()
    {
        $this->form->update();
        Notification::make()
            ->title('Actualizado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/costos', true);
    }
}