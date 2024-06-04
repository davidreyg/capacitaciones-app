<?php

namespace App\Containers\AppSection\Nivel\UI\WEB\Components;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Niveles de evaluación')]
class NivelList extends Component
{
    public function render()
    {
        return view('appSection@nivel::nivel-list');
    }
}