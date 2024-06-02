<?php

namespace App\Containers\AppSection\Modalidad\UI\WEB\Forms;

use App\Containers\AppSection\Modalidad\Models\Modalidad;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ModalidadForm extends Form
{
    public ?Modalidad $modalidad;

    #[Validate]
    public $nombre;

    public function setModalidad(?Modalidad $modalidad)
    {
        $this->modalidad = $modalidad;
        $this->nombre = $modalidad->nombre;
    }

    public function rules()
    {
        $rules = [
            'nombre' => [
                'required',
                'max:50',
                'unique:modalidads'
            ],
        ];
        // Condición para agregar la regla unique
        if (isset($this->modalidad)) {
            $rules['nombre'][] = Rule::unique('modalidads')->ignore($this->modalidad);
        }
        return $rules;
    }

    public function store()
    {
        $this->validate();
        Modalidad::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->modalidad->update($this->all());

        $this->reset();
    }
}