<?php

namespace App\Containers\AppSection\Costo\UI\WEB\Components;

use App\Containers\AppSection\Costo\UI\WEB\Forms\CostoForm;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Costos')]
class CostoCreate extends Component
{
    public CostoForm $form;

    public function render()
    {
        return view('appSection@costo::costo-create');
    }
    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Guardado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/costos', true);
    }
}