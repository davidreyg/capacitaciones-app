<?php

namespace App\Containers\AppSection\Establecimiento\UI\WEB\Forms;

use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EstablecimientoForm extends Form
{
    public ?Establecimiento $establecimiento;

    #[Validate]
    public $nombre;

    #[Validate]
    public $codigo;

    #[Validate]
    public $direccion;

    #[Validate]
    public $telefono;

    #[Validate]
    public $ris;

    #[Validate]
    public $has_lab;

    public function setEstablecimiento(?Establecimiento $establecimiento)
    {
        $this->establecimiento = $establecimiento;
        $this->nombre = $establecimiento->nombre;
        $this->codigo = $establecimiento->codigo;
        $this->direccion = $establecimiento->direccion;
        $this->telefono = $establecimiento->telefono;
        $this->ris = $establecimiento->ris;
        $this->has_lab = $establecimiento->has_lab;
    }

    public function rules()
    {
        $rules = [
            'nombre' => [
                'required',
            ],
            'codigo' => [
                'required',
                'numeric',
                'integer',
                'gt:0',
            ],
            'direccion' => [
                'required',
                'max:60',
            ],
            'ris' => [
                'required',
                'max:100',
            ],
            'telefono' => [
                'required',
                'numeric',
                'integer',
                'gt:0',
            ],
            'has_lab' => [
                'required',
                'boolean',
            ],
        ];

        // Condición para agregar la regla unique
        if (isset($this->establecimiento)) {
            $rules['codigo'][] = Rule::unique('establecimientos')->ignore($this->establecimiento);
        }

        return $rules;
    }

    public function store()
    {
        $this->validate();
        Establecimiento::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->establecimiento->update($this->all());

        $this->reset();
    }
}