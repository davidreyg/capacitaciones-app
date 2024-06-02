<?php

namespace App\Containers\AppSection\Oportunidad\UI\WEB\Forms;

use App\Containers\AppSection\Oportunidad\Models\Oportunidad;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OportunidadForm extends Form
{
    public ?Oportunidad $oportunidad;

    #[Validate]
    public $nombre;

    public function setOportunidad(?Oportunidad $oportunidad)
    {
        $this->oportunidad = $oportunidad;
        $this->nombre = $oportunidad->nombre;
    }

    public function rules()
    {
        $rules = [
            'nombre' => [
                'required',
                'max:50',

            ],
        ];
        // Condición para agregar la regla unique
        if (isset($this->oportunidad)) {
            $rules['nombre'][] = Rule::unique('oportunidads')->ignore($this->oportunidad);
        } else {
            $rules['nombre'][] = Rule::unique('oportunidads');

        }
        return $rules;
    }

    public function store()
    {
        $this->validate();
        Oportunidad::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->oportunidad->update($this->all());

        $this->reset();
    }
}