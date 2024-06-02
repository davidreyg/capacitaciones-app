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

    public function setUser(?User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->nombre_completo = $user->nombre_completo;
        $this->cargo = $user->cargo;
        $this->establecimiento_id = $user->establecimiento_id;
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
        ];

        return $rules;
    }

    public function store()
    {
        $this->validate();
        User::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $this->user->update($this->all());
        $this->reset();
    }
}