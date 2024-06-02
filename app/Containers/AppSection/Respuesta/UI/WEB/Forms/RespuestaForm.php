<?php

namespace App\Containers\AppSection\Respuesta\UI\WEB\Forms;

use App\Containers\AppSection\Respuesta\Models\Respuesta;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RespuestaForm extends Form
{
    public ?Respuesta $respuesta;

    #[Validate]
    public $nombre;

    public function setRespuesta(?Respuesta $respuesta)
    {
        $this->respuesta = $respuesta;
        $this->nombre = $respuesta->nombre;
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
        if (isset($this->respuesta)) {
            $rules['nombre'][] = Rule::unique('respuestas')->ignore($this->respuesta);
        } else {
            $rules['nombre'][] = Rule::unique('respuestas');

        }
        return $rules;
    }

    public function store()
    {
        $this->validate();
        Respuesta::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->respuesta->update($this->all());

        $this->reset();
    }
}