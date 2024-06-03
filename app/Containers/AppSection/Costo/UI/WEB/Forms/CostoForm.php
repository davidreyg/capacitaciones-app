<?php

namespace App\Containers\AppSection\Costo\UI\WEB\Forms;

use App\Containers\AppSection\Costo\Models\Costo;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CostoForm extends Form
{
    public ?Costo $costo;

    #[Validate]
    public $nombre;

    #[Validate]
    public $tipo;


    public function setCosto(?Costo $costo)
    {
        $this->costo = $costo;
        $this->nombre = $costo->nombre;
        $this->tipo = $costo->tipo;
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
        if (isset($this->costo)) {
            $rules['nombre'][] = Rule::unique('costos')->ignore($this->costo);
        } else {
            $rules['nombre'][] = Rule::unique('costos');

        }
        return $rules;
    }

    public function store()
    {
        $this->validate();
        Costo::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $this->costo->update($this->all());
        $this->reset();
    }
}