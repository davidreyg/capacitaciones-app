<?php

namespace App\Containers\AppSection\Establecimiento\UI\WEB\Components;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Establecimientos')]
class EstablecimientoList extends Component
{
    public function render()
    {
        return view('appSection@establecimiento::establecimiento-list');
    }
}