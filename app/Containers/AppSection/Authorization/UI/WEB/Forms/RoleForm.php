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

    #[Validate]
    public array $privilegio_ids = [];

    public function setRole(?Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->guard_name = $role->guard_name;
        $this->display_name = $role->display_name;
        $this->description = $role->description;
        $this->privilegio_ids = $role->privilegios()->pluck('id')->toArray();
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
            ],
            'privilegio_ids' => [
                'nullable',
                'array',
            ],
            'privilegio_ids.*' => [
                'required',
                'integer',
            ]
        ];

        return $rules;
    }

    public function store()
    {
        $this->validate();
        $role = Role::create($this->all());
        $role->privilegios()->sync($this->privilegio_ids);
        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $this->role->update($this->all());
        $this->role->privilegios()->sync($this->privilegio_ids);
        $this->reset();
    }
}