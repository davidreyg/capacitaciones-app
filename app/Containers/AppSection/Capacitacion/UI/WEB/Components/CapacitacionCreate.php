<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use App\Containers\AppSection\Capacitacion\Models\Capacitacion;
use App\Containers\AppSection\Capacitacion\Traits\ManageEstablecimientosTrait;
use App\Containers\AppSection\Capacitacion\UI\WEB\Forms\CapacitacionForm;
use App\Containers\AppSection\Capacitacion\Traits\CapacitacionComputedAttributesTrait;
use App\Containers\AppSection\Item\Models\Item;
use App\Containers\AppSection\Respuesta\Models\Respuesta;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Capacitaciones')]
class CapacitacionCreate extends Component
{
    use CapacitacionComputedAttributesTrait, ManageEstablecimientosTrait;
    public CapacitacionForm $form;

    public $selected_tab;
    public $costo_id;
    public $modalClonar;

    public function mount()
    {
        $this->selected_tab = 'datos-generales';
        $this->initialFormData();
    }

    public function clonarCapacitacion(Capacitacion $capacitacion)
    {
        $this->form->setCapacitacion($capacitacion);
        $this->modalClonar = !$this->modalClonar;
    }

    public function resetForm()
    {
        $this->form->reset();
        $this->form->resetValidation();
        $this->initialFormData();
    }

    public function initialFormData(): void
    {
        $this->form->is_edit = false;
        $this->form->fecha_inicio = now()->toDateString();
        $this->form->fecha_fin = now()->addDay()->toDateString();
        $this->form->capacitacion_item = $this->items->mapWithKeys(function (Item $item) {
            return [
                $item->id => [
                    'item_id' => $item->id,
                    'respuesta_id' => null,
                    'nombre' => $item->nombre,
                    'respuestas' => $item->respuestas->mapWithKeys(function (Respuesta $respuesta) {
                        return [
                            $respuesta->id => [
                                'id' => $respuesta->id,
                                'nombre' => $respuesta->nombre,
                                'valor' => $respuesta->pivot->valor,
                            ]
                        ];
                    })->toArray()
                ]
            ];
        })->toArray();
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