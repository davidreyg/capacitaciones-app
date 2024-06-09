<?php

namespace App\Containers\AppSection\Capacitacion\Traits;

use App\Containers\AppSection\Costo\Models\Costo;
use App\Containers\AppSection\EjeTematico\Models\EjeTematico;
use App\Containers\AppSection\Item\Models\Item;
use App\Containers\AppSection\Modalidad\Models\Modalidad;
use App\Containers\AppSection\Nivel\Models\Nivel;
use App\Containers\AppSection\Oportunidad\Models\Oportunidad;
use App\Containers\AppSection\TipoCapacitacion\Models\TipoCapacitacion;
use Filament\Notifications\Notification;
use Livewire\Attributes\Computed;

trait CapacitacionComputedAttributesTrait
{

    #[Computed]
    public function ejes_tematicos()
    {
        return EjeTematico::get();
    }

    #[Computed]
    public function oportunidades()
    {
        return Oportunidad::get();
    }

    #[Computed]
    public function modalidades()
    {
        return Modalidad::get();
    }

    #[Computed]
    public function niveles()
    {
        return Nivel::get();
    }

    #[Computed]
    public function items()
    {
        return Item::with('respuestas')->get();
    }

    #[Computed]
    public function tipo_capacitaciones()
    {
        return TipoCapacitacion::get();
    }

    #[Computed]
    public function costos()
    {
        return Costo::get();
    }

    public function addCosto()
    {
        $costo = $this->costos->find($this->costo_id);
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

    public function updatedFormIsLibre($value)
    {
        $this->form->vacantes = 0;
    }
}