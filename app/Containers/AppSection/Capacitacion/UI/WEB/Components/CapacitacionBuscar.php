<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Buscar Capacitaciones')]
class CapacitacionBuscar extends Component
{
    #[Computed]
    public function capacitaciones()
    {
        return \Auth::user()->establecimiento->
            capacitacions()
            ->where('capacitacions.estado', config('appSection-capacitacion.estado.C.slug'))
            ->wherePivot('estado', config('appSection-capacitacion.estado_establecimiento.HABILITADO.nombre'))->with(['modalidad'])->get();
    }

    public function render()
    {
        return view('appSection@capacitacion::capacitacion-buscar');
    }
}