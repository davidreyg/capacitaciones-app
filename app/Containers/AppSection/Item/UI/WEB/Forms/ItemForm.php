<?php

namespace App\Containers\AppSection\Item\UI\WEB\Forms;

use App\Containers\AppSection\Item\Models\Item;
use App\Containers\AppSection\Respuesta\Models\Respuesta;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ItemForm extends Form
{
    public ?Item $item;

    #[Validate]
    public $nombre;

    #[Validate]
    public $item_respuesta = [];

    public function setItem(?Item $item)
    {
        $this->item = $item;
        $this->nombre = $item->nombre;
        $this->item_respuesta = $item->respuestas->map(function (Respuesta $respuesta) {
            return [
                'respuesta_id' => $respuesta->pivot->respuesta_id,
                'respuesta_nombre' => $respuesta->nombre,
                'valor' => $respuesta->pivot->valor,
            ];
        })->toArray();
    }

    public function rules()
    {
        $rules = [
            'nombre' => [
                'required',
                'max:50',
            ],
            'item_respuesta' => [
                'nullable',
                'array',
            ],
            'item_respuesta.*.respuesta_id' => [
                'required',
            ],
            'item_respuesta.*.valor' => [
                'required',
                'string',
                'max:2',
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

    public function validationAttributes()
    {
        return [
            'item_respuesta.*.valor' => 'valor',
            'item_respuesta.*.respuesta_id' => 'respuesta',
        ];
    }

    public function store()
    {
        return \DB::transaction(function () {
            $this->validate();
            $item = Item::create($this->all());
            foreach ($this->item_respuesta as $respuesta) {
                $item->respuestas()->attach($respuesta['respuesta_id'], ['valor' => $respuesta['valor']]);
            }
            $this->reset();
        });
    }

    public function update()
    {
        return \DB::transaction(function () {
            $this->validate();
            $this->item->update($this->all());
            // Preparar datos para sincronización
            $syncData = [];
            foreach ($this->item_respuesta as $respuesta) {
                $syncData[$respuesta['respuesta_id']] = ['valor' => $respuesta['valor']];
            }

            // Sincronizar respuestas y valores
            $this->item->respuestas()->sync($syncData);
            $this->reset();
        });

    }
}