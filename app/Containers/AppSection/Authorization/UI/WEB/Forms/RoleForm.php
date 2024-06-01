<?php

namespace App\Containers\AppSection\Authorization\UI\WEB\Forms;

use App\Containers\AppSection\Authorization\Models\Role;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RoleForm extends Form
{
    public ?Role $role;

    #[Validate]
    public $name;

    #[Validate]
    public $guard_name;

    #[Validate]
    public $display_name;

    #[Validate]
    public $description;

    public function setRole(?Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->guard_name = $role->guard_name;
        $this->display_name = $role->display_name;
        $this->description = $role->description;
    }

    public function rules()
    {
        $rules = [
            'name' => [
                'required',
            ],
            'guard_name' => [
                'required',
                'string',
            ],
            'display_name' => [
                'nullable',
                'max:60',
            ],
            'description' => [
                'nullable',
                'string',
            ]
        ];

        // Condición para agregar la regla unique
        // if (isset($this->role)) {
        //     $rules['guard_name'][] = Rule::unique('roles')->ignore($this->role);
        // }

        return $rules;
    }

    public function store()
    {
        $this->validate();
        Role::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $this->role->update($this->all());
        $this->reset();
    }
}