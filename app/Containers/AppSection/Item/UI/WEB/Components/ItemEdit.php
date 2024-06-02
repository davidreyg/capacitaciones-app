<?php

namespace App\Containers\AppSection\Item\UI\WEB\Components;

use App\Containers\AppSection\Item\Models\Item;
use App\Containers\AppSection\Item\UI\WEB\Forms\ItemForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class ItemEdit extends Component
{
    public ItemForm $form;

    public function mount(Item $item)
    {
        $this->form->setItem($item);
    }

    public function render()
    {
        return view('appSection@item::item-edit');
    }

    public function update()
    {
        $this->form->update();
        Notification::make()
            ->title('Actualizado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/items', true);
    }
}