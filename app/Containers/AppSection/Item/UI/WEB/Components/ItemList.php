<?php

namespace App\Containers\AppSection\Item\UI\WEB\Components;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Items')]
class ItemList extends Component
{
    public function render()
    {
        return view('appSection@item::item-list');
    }
}