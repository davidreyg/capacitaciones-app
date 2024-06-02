<?php

namespace App\Containers\AppSection\TipoCapacitacion\UI\WEB\Forms;

use App\Containers\AppSection\TipoCapacitacion\Models\TipoCapacitacion;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TipoCapacitacionForm extends Form
{
    public ?TipoCapacitacion $tipoCapacitacion;

    #[Validate]
    public $nombre;

    public function setTipoCapacitacion(?TipoCapacitacion $tipoCapacitacion)
    {
        $this->tipoCapacitacion = $tipoCapacitacion;
        $this->nombre = $tipoCapacitacion->nombre;
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
        if (isset($this->tipoCapacitacion)) {
            $rules['nombre'][] = Rule::unique('tipo_capacitacions')->ignore($this->tipoCapacitacion);
        } else {
            $rules['nombre'][] = Rule::unique('tipo_capacitacions');

        }
        return $rules;
    }

    public function store()
    {
        $this->validate();
        TipoCapacitacion::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->tipoCapacitacion->update($this->all());

        $this->reset();
    }
}