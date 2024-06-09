<?php

namespace App\Containers\AppSection\Capacitacion\Traits;

use Filament\Notifications\Notification;

trait ManageEstablecimientosTrait
{
    public $establecimiento_id;

    public function addEstablecimiento()
    {
        $establecimiento = $this->establecimientos->find($this->establecimiento_id);
        if (!$establecimiento) {
            Notification::make()
                ->title('No selecciono establecimiento.')
                ->danger()
                ->send();
            return;
        }

        if (!in_array($establecimiento->id, array_column($this->form->capacitacion_establecimiento, 'establecimiento_id'))) {
            $this->form->capacitacion_establecimiento[$establecimiento->id] = [
                'establecimiento_id' => $establecimiento->id,
                'nombre' => $establecimiento->nombre,
                'estado' => config('appSection-capacitacion.estado_establecimiento.SOLICITADO.nombre'),
            ];
            $this->establecimiento_id = null;
        } else {
            Notification::make()
                ->title('Ya has agregado este elemento.')
                ->warning()
                ->send();
            return;
        }
    }

    public function removeEstablecimiento($establecimiento_id)
    {
        unset($this->form->capacitacion_establecimiento[$establecimiento_id]);
    }

    public function cambiarEstado($establecimiento_id)
    {

        $this->form->capacitacion_establecimiento[$establecimiento_id]['estado'] =
            $this->form->capacitacion_establecimiento[$establecimiento_id]['estado'] ===
            config('appSection-capacitacion.estado_establecimiento.APROBADO.nombre')
            ? config('appSection-capacitacion.estado_establecimiento.SOLICITADO.nombre')
            : config('appSection-capacitacion.estado_establecimiento.APROBADO.nombre');
        // if ($this->form->capacitacion_establecimiento[$establecimiento_id]['estado'] === config('appSection-capacitacion.estado_establecimiento.SOLICITADO.nombre')) {
        //     $this->form->capacitacion_establecimiento[$establecimiento_id]['estado'] = config('appSection-capacitacion.estado_establecimiento.APROBADO.nombre');
        // }

        // if ($this->form->capacitacion_establecimiento[$establecimiento_id]['estado'] === config('appSection-capacitacion.estado_establecimiento.APROBADO.nombre')) {
        //     $this->form->capacitacion_establecimiento[$establecimiento_id]['estado'] = config('appSection-capacitacion.estado_establecimiento.SOLICITADO.nombre');
        // }
        // dd($this->form->capacitacion_establecimiento[$establecimiento_id]);
    }
}