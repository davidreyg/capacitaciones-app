<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Forms;

use App\Containers\AppSection\Capacitacion\Models\Capacitacion;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CapacitacionForm extends Form
{
    public ?Capacitacion $capacitacion;

    #[Validate]
    public $nombre;

    #[Validate]
    public $tipo;


    public function setCapacitacion(?Capacitacion $capacitacion)
    {
        $this->capacitacion = $capacitacion;
        $this->nombre = $capacitacion->nombre;
        $this->tipo = $capacitacion->tipo;
    }

    public function rules()
    {
        $rules = [
            'nombre' => [
                'required',
                'max:50',
            ],
            'tipo' => [
                'required',
                'max:50',
            ],
        ];
        // Condición para agregar la regla unique
        if (isset($this->capacitacion)) {
            $rules['nombre'][] = Rule::unique('capacitacions')->ignore($this->capacitacion);
        } else {
            $rules['nombre'][] = Rule::unique('capacitacions');

        }
        return $rules;
    }

    public function store()
    {
        $this->validate();
        Capacitacion::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $this->capacitacion->update($this->all());
        $this->reset();
    }
}