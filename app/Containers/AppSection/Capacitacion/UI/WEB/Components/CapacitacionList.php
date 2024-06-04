<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Capacitaciones')]
class CapacitacionList extends Component
{
    public function render()
    {
        return view('appSection@capacitacion::capacitacion-list');
    }
}