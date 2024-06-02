<?php

namespace App\Containers\AppSection\Item\UI\WEB\Forms;

use App\Containers\AppSection\Item\Models\Item;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ItemForm extends Form
{
    public ?Item $item;

    #[Validate]
    public $nombre;

    #[Validate]
    public $descripcion;

    public function setItem(?Item $item)
    {
        $this->item = $item;
        $this->nombre = $item->nombre;
        $this->descripcion = $item->descripcion;
    }

    public function rules()
    {
        $rules = [
            'nombre' => [
                'required',
                'max:50',
            ],
            'descripcion' => [
                'nullable',
                'max:200',
            ],
        ];
        // Condición para agregar la regla unique
        if (isset($this->item)) {
            $rules['nombre'][] = Rule::unique('items')->ignore($this->item);
        } else {
            $rules['nombre'][] = Rule::unique('items');

        }
        return $rules;
    }

    public function store()
    {
        $this->validate();
        Item::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->item->update($this->all());

        $this->reset();
    }
}