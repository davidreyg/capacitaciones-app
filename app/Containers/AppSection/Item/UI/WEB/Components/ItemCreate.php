<?php

namespace App\Containers\AppSection\Item\UI\WEB\Components;

use App\Containers\AppSection\Item\UI\WEB\Forms\ItemForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class ItemCreate extends Component
{
    public ItemForm $form;

    public function render()
    {
        return view('appSection@item::item-create');
    }

    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Guardado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/items', true);
    }
}