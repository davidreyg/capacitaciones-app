<?php

namespace App\Containers\AppSection\User\UI\WEB\Components;

use Livewire\Component;

class UserList extends Component
{
    public function render()
    {
        return view('appSection@user::user-list');
    }
}