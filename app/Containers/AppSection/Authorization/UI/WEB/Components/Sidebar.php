<?php

namespace App\Containers\AppSection\Authorization\UI\WEB\Components;

use App\Containers\AppSection\Authorization\Models\Privilegio;
use Livewire\Component;

class Sidebar extends Component
{
    public $privilegios;
    public function mount()
    {
        $this->privilegios = Privilegio::get();
    }
    public function render()
    {
        return view('partials.sidebar');
    }
}