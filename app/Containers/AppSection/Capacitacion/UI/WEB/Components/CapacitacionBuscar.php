<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Buscar Capacitaciones')]
class CapacitacionBuscar extends Component
{
    public function render()
    {
        return view('appSection@capacitacion::capacitacion-buscar');
    }
}