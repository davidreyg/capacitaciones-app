<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Habilitar Capacitación')]
class CapacitacionHabilitar extends Component
{
    public function render()
    {
        return view('appSection@capacitacion::capacitacion-habilitar');
    }
}