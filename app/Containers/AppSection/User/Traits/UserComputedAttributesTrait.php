<?php

namespace App\Containers\AppSection\User\Traits;

use App\Containers\AppSection\Authorization\Models\Role;
use Livewire\Attributes\Computed;

trait UserComputedAttributesTrait
{

    #[Computed]
    public function roles()
    {
        return Role::whereGuardName('web')->get();
    }
}