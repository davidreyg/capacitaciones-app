<?php

namespace App\Containers\AppSection\Nivel\UI\WEB\Forms;

use App\Containers\AppSection\Nivel\Models\Nivel;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class NivelForm extends Form
{
    public ?Nivel $nivel;

    #[Validate]
    public $nombre;

    #[Validate]
    public $tipo;


    public function setNivel(?Nivel $nivel)
    {
        $this->nivel = $nivel;
        $this->nombre = $nivel->nombre;
        $this->tipo = $nivel->tipo;
    }

    public function rules()
    {
        $rules = [
            'nombre' => [
                'required',
                'max:50',
            ]
        ];
        // Condición para agregar la regla unique
        if (isset($this->nivel)) {
            $rules['nombre'][] = Rule::unique('nivels')->ignore($this->nivel);
        } else {
            $rules['nombre'][] = Rule::unique('nivels');

        }
        return $rules;
    }

    public function store()
    {
        $this->validate();
        Nivel::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $this->nivel->update($this->all());
        $this->reset();
    }
}