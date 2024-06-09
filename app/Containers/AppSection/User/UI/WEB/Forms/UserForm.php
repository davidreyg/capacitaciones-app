<?php

namespace App\Containers\AppSection\User\UI\WEB\Forms;

use App\Containers\AppSection\User\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;

    #[Validate]
    public $name;

    #[Validate]
    public $nombre_completo;

    #[Validate]
    public $cargo;

    #[Validate]
    public $password;

    #[Validate]
    public $establecimiento_id;

    #[Validate]
    public $role_ids = [];

    public function setUser(?User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->nombre_completo = $user->nombre_completo;
        $this->cargo = $user->cargo;
        $this->establecimiento_id = $user->establecimiento_id;
        $this->role_ids = $user->roles()->pluck('id')->toArray();
    }

    public function rules()
    {
        $rules = [
            'name' => [
                'required',
            ],
            'nombre_completo' => [
                'required',
                'string',
            ],
            'cargo' => [
                'required',
                'max:60',
            ],
            'password' => [
                'required',
                'string',
                'min:5'
            ],
            'establecimiento_id' => [
                'required',
                'exists:establecimientos,id',
            ],
            'role_ids' => [
                'required',
                'array',
            ],
            'role_ids.*' => [
                'required',
                'exists:roles,id',
            ],
        ];

        return $rules;
    }

    public function store()
    {
        return \DB::transaction(function () {
            $validated = $this->validate();
            $user = User::create($validated);
            $user->syncRoles($this->role_ids);
            $this->reset();
        });
    }

    public function update()
    {
        return \DB::transaction(function () {
            $validated = $this->validate();
            $this->user->update($validated);
            $this->user->syncRoles($this->role_ids);
            $this->reset();
        });
    }
}