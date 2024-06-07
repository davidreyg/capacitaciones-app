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
    public $categoria;

    #[Validate]
    public $ris;

    #[Validate]
    public $distrito;
    #[Validate]
    public $correo;

    #[Validate]
    public $telefono;

    #[Validate]
    public $tipo;

    #[Validate]
    public $parent_id;

    public function setEstablecimiento(?Establecimiento $establecimiento)
    {
        $this->establecimiento = $establecimiento;
        $this->nombre = $establecimiento->nombre;
        $this->codigo = $establecimiento->codigo;
        $this->direccion = $establecimiento->direccion;
        $this->categoria = $establecimiento->categoria;
        $this->telefono = $establecimiento->telefono;
        $this->ris = $establecimiento->ris;
        $this->distrito = $establecimiento->distrito;
        $this->correo = $establecimiento->correo;
        $this->tipo = $establecimiento->tipo;
        $this->parent_id = $establecimiento->parent_id;
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
                'nullable',
                'max:60',
            ],
            'categoria' => [
                Rule::requiredIf($this->tipo === config('appSection-establecimiento.tipo_establecimiento.ESTABLECIMIENTO')),
                'max:4',
            ],
            'ris' => [
                Rule::requiredIf($this->tipo === config('appSection-establecimiento.tipo_establecimiento.ESTABLECIMIENTO')),
                'max:60',
            ],
            'distrito' => [
                Rule::requiredIf($this->tipo === config('appSection-establecimiento.tipo_establecimiento.ESTABLECIMIENTO')),
                'max:60',
            ],
            'correo' => [
                'required',
                'email',
                'max:60',
            ],
            'telefono' => [
                'nullable',
                'numeric',
                'integer',
                'gt:0',
            ],
            'tipo' => [
                'required',
                'max:30',
            ],
            'parent_id' => [
                'nullable',
                Rule::requiredIf($this->tipo !== config('appSection-establecimiento.tipo_establecimiento.DIRIS')),
                'exists:establecimientos,id',
            ],
        ];

        // Condición para agregar la regla unique
        if (isset($this->establecimiento)) {
            $rules['codigo'][] = Rule::unique('establecimientos')->ignore($this->establecimiento);
        } else {
            $rules['codigo'][] = Rule::unique('establecimientos');

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