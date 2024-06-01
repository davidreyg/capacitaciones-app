<?php

namespace App\Containers\AppSection\Authorization\UI\WEB\Components;

use Livewire\Component;

class RoleList extends Component
{
    public function render()
    {
        return view('appSection@authorization::role-list');
    }
}