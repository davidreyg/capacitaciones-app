<?php

namespace App\Containers\AppSection\EjeTematico\UI\WEB\Forms;

use App\Containers\AppSection\EjeTematico\Models\EjeTematico;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EjeTematicoForm extends Form
{
    public ?EjeTematico $ejeTematico;

    #[Validate]
    public $nombre;

    public function setEjeTematico(?EjeTematico $ejeTematico)
    {
        $this->ejeTematico = $ejeTematico;
        $this->nombre = $ejeTematico->nombre;
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
        if (isset($this->ejeTematico)) {
            $rules['nombre'][] = Rule::unique('eje_tematicos')->ignore($this->ejeTematico);
        } else {
            $rules['nombre'][] = Rule::unique('eje_tematicos');
        }
        return $rules;
    }

    public function store()
    {
        $this->validate();
        EjeTematico::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->ejeTematico->update($this->all());

        $this->reset();
    }
}