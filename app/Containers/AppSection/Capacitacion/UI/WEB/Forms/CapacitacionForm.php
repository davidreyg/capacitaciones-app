<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Forms;

use App\Containers\AppSection\Capacitacion\Models\Capacitacion;
use App\Containers\AppSection\Item\Models\Item;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CapacitacionForm extends Form
{
    public ?Capacitacion $capacitacion;

    #[Validate]
    public $codigo;
    #[Validate]
    public $nombre;
    #[Validate]
    public $fecha_inicio;
    #[Validate]
    public $fecha_fin;
    #[Validate]
    public $tipo_capacitacion_id;
    #[Validate]
    public $eje_tematico_id;
    #[Validate]
    public $modalidad_id;
    #[Validate]
    public $oportunidad_id;
    #[Validate]
    public $nivel_ids = [];
    /** NIVELES FALTA */
    #[Validate]
    public $perfil;
    #[Validate]
    public $objetivo_aprendizaje;
    #[Validate]
    public $objetivo_desempeño;
    #[Validate]
    public $numero_horas;
    #[Validate]
    public $creditos;
    #[Validate]
    public $problema;

    #[Validate]
    public $capacitacion_item = [];

    public function setCapacitacion(?Capacitacion $capacitacion)
    {
        $this->capacitacion = $capacitacion;
        $this->codigo = $capacitacion->codigo;
        $this->nombre = $capacitacion->nombre;
        $this->fecha_inicio = $capacitacion->fecha_inicio;
        $this->fecha_fin = $capacitacion->fecha_fin;
        $this->tipo_capacitacion_id = $capacitacion->tipo_capacitacion_id;
        $this->eje_tematico_id = $capacitacion->eje_tematico_id;
        $this->modalidad_id = $capacitacion->modalidad_id;
        $this->oportunidad_id = $capacitacion->oportunidad_id;
        $this->nivel_ids = $capacitacion->nivels()->pluck('id')->toArray();
        $this->perfil = $capacitacion->perfil;
        $this->objetivo_aprendizaje = $capacitacion->objetivo_aprendizaje;
        $this->objetivo_desempeño = $capacitacion->objetivo_desempeño;
        $this->numero_horas = $capacitacion->numero_horas;
        $this->creditos = $capacitacion->creditos;
        $this->problema = $capacitacion->problema;
        $this->capacitacion_item = $capacitacion->items->map(function (Item $item) {
            return [
                'item_id' => $item->pivot->item_id,
                'respuesta_id' => $item->pivot->respuesta_id,
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
            'codigo' => [
                'required',
                'max:50',
            ],
            'fecha_inicio' => [
                'required',
                'date',
                'after_or_equal:now'
            ],
            'fecha_fin' => [
                'required',
                'date',
                'after:fecha_inicio'
            ],
            'tipo_capacitacion_id' => [
                'required',
                'exists:tipo_capacitacions,id',
            ],
            'eje_tematico_id' => [
                'required',
                'exists:eje_tematicos,id',
            ],
            'modalidad_id' => [
                'required',
                'exists:modalidads,id',
            ],
            'oportunidad_id' => [
                'required',
                'exists:oportunidads,id',
            ],
            'nivel_ids' => [
                'required',
                'array',
                'min:1'
            ],
            'perfil' => [
                'required',
                'string',
                'max:255',
            ],
            'objetivo_aprendizaje' => [
                'required',
                'string',
                'max:255',
            ],
            'objetivo_desempeño' => [
                'required',
                'string',
                'max:255',
            ],
            'numero_horas' => [
                'required',
                'integer',
                'min:0',
                'max:255',
            ],
            'creditos' => [
                'required',
                'integer',
                'min:0',
                'max:255',
            ],
            'problema' => [
                'required',
                'string',
                'max:255',
            ],
            'capacitacion_item' => [
                'required',
                'array',
            ],
            'capacitacion_item.*.item_id' => [
                'required',
            ],
            'capacitacion_item.*.respuesta_id' => [
                'required',
            ],
        ];
        // Condición para agregar la regla unique
        if (isset($this->capacitacion)) {
            $rules['codigo'][] = Rule::unique('capacitacions')->ignore($this->capacitacion);
        } else {
            $rules['codigo'][] = Rule::unique('capacitacions');
        }
        return $rules;
    }

    public function store()
    {
        return \DB::transaction(function () {
            $this->validate();
            $capacitacion = Capacitacion::create($this->all());
            $capacitacion->nivels()->sync($this->nivel_ids);
            // Preparar datos para sincronización
            $syncData = [];
            foreach ($this->capacitacion_item as $item) {
                $syncData[$item['item_id']] = ['respuesta_id' => $item['respuesta_id']];
            }
            // Sincronizar respuestas y valores
            $capacitacion->items()->sync($syncData);
            $this->reset();
        });
    }

    public function update()
    {
        return \DB::transaction(function () {
            $this->validate();
            $this->capacitacion->update($this->all());
            $this->capacitacion->nivels()->sync($this->nivel_ids);
            // Preparar datos para sincronización
            $syncData = [];
            foreach ($this->capacitacion_item as $item) {
                $syncData[$item['item_id']] = ['respuesta_id' => $item['respuesta_id']];
            }
            // Sincronizar respuestas y valores
            $this->capacitacion->items()->sync($syncData);
            $this->reset();
        });
    }
}