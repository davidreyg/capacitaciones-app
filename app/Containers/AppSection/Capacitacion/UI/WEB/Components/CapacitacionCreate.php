<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use App\Containers\AppSection\Capacitacion\UI\WEB\Forms\CapacitacionForm;
use App\Containers\AppSection\Costo\Models\Costo;
use App\Containers\AppSection\EjeTematico\Models\EjeTematico;
use App\Containers\AppSection\Item\Models\Item;
use App\Containers\AppSection\Modalidad\Models\Modalidad;
use App\Containers\AppSection\Nivel\Models\Nivel;
use App\Containers\AppSection\Oportunidad\Models\Oportunidad;
use App\Containers\AppSection\TipoCapacitacion\Models\TipoCapacitacion;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Capacitaciones')]
class CapacitacionCreate extends Component
{
    public CapacitacionForm $form;
    public $tipo_capacitaciones;
    public $ejes_tematicos;
    public $oportunidades;
    public $modalidades;
    public $niveles;
    public $items;
    public $costos;
    public $selected_tab;
    public $costo_id;

    public function mount()
    {
        $this->selected_tab = 'datos-generales';
        $this->tipo_capacitaciones = TipoCapacitacion::get();
        $this->ejes_tematicos = EjeTematico::get();
        $this->oportunidades = Oportunidad::get();
        $this->modalidades = Modalidad::get();
        $this->niveles = Nivel::get();
        $this->items = Item::with('respuestas')->get();
        $this->costos = Costo::get();
        $this->form->fecha_inicio = now()->toDateString();
        $this->form->fecha_fin = now()->addDay()->toDateString();
        $this->form->capacitacion_item = $this->items->map(function ($item) {
            return [
                'item_id' => $item->id,
                'respuesta_id' => null, // Asumiendo que quieres preseleccionar la primera costo
            ];
        })->toArray();
    }

    public function addCosto()
    {
        $costo = Costo::find($this->costo_id);
        if (!$costo) {
            Notification::make()
                ->title('No selecciono costo.')
                ->danger()
                ->send();
            return;
        }

        if (!in_array($costo->id, array_column($this->form->capacitacion_costo, 'costo_id'))) {
            $this->form->capacitacion_costo[$costo->id] = [
                'costo_id' => $costo->id,
                'nombre' => $costo->nombre,
                'tipo' => $costo->tipo,
                'valor' => null
            ];
            $this->costo_id = null;
        } else {
            Notification::make()
                ->title('Ya has agregado este elemento.')
                ->warning()
                ->send();
            return;
        }
    }

    public function removeCosto($costo_id)
    {
        unset($this->form->capacitacion_costo[$costo_id]);
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