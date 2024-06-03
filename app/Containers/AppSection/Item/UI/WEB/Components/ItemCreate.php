<?php

namespace App\Containers\AppSection\Item\UI\WEB\Components;

use App\Containers\AppSection\Item\UI\WEB\Forms\ItemForm;
use App\Containers\AppSection\Respuesta\Models\Respuesta;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Items')]
class ItemCreate extends Component
{
    public ItemForm $form;
    public $respuestas;
    public $respuesta_id;

    public function mount()
    {
        $this->respuestas = Respuesta::get()->toArray();
    }

    public function render()
    {
        return view('appSection@item::item-create');
    }

    public function addRespuesta()
    {
        $respuesta = Respuesta::find($this->respuesta_id);
        if (!$respuesta) {
            Notification::make()
                ->title('No selecciono respuesta.')
                ->danger()
                ->send();
            return;
        }

        if (!in_array($respuesta->id, array_column($this->form->item_respuesta, 'respuesta_id'))) {
            $this->form->item_respuesta[] = [
                'respuesta_id' => $respuesta->id,
                'respuesta_nombre' => $respuesta->nombre,
                'valor' => null
            ];
            $this->respuesta_id = null;
        } else {
            Notification::make()
                ->title('Ya has agregado este elemento.')
                ->warning()
                ->send();
            return;
        }
    }

    public function removeRespuesta($index)
    {
        unset($this->form->item_respuesta[$index]);
        $this->form->item_respuesta = array_values($this->form->item_respuesta);
    }

    public function updated($key, $value)
    {
        $this->validateOnly($key);
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