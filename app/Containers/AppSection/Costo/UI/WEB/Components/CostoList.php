<?php

namespace App\Containers\AppSection\Costo\UI\WEB\Components;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Costos')]
class CostoList extends Component
{
    public function render()
    {
        return view('appSection@costo::costo-list');
    }
}