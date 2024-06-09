<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Forms;

use App\Containers\AppSection\Capacitacion\Models\Capacitacion;
use App\Containers\AppSection\Costo\Models\Costo;
use App\Containers\AppSection\Item\Models\Item;
use App\Containers\AppSection\Respuesta\Models\Respuesta;
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
    public $is_libre;
    #[Validate]
    public $vacantes;

    #[Validate]
    public $capacitacion_item = [];
    #[Validate]
    public $capacitacion_costo = [];

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
        $this->is_libre = $capacitacion->is_libre;
        $this->vacantes = $capacitacion->vacantes;
        $this->capacitacion_item = $capacitacion->items->mapWithKeys(function (Item $item) {
            return [
                $item->id => [
                    'item_id' => $item->id,
                    'respuesta_id' => $item->pivot->respuesta_id,
                    'nombre' => $item->nombre,
                    'respuestas' => $item->respuestas->mapWithKeys(function (Respuesta $respuesta) {
                        return [
                            $respuesta->id => [
                                'id' => $respuesta->id,
                                'nombre' => $respuesta->nombre,
                                'valor' => $respuesta->pivot->valor,
                            ]
                        ];
                    })->toArray()
                ]
            ];
        })->toArray();
        $this->capacitacion_costo = $capacitacion->costos->mapWithKeys(function (Costo $costo) {
            return [
                $costo->pivot->costo_id => [
                    'costo_id' => $costo->pivot->costo_id,
                    'nombre' => $costo->nombre,
                    'tipo' => $costo->tipo,
                    'valor' => $costo->pivot->valor,
                ]
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
                'date_format:Y-m-d',
                'after_or_equal:' . now()->format('Y-m-d')
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
            'is_libre' => [
                'required',
                'boolean',
            ],
            'vacantes' => [
                Rule::requiredIf(!$this->is_libre),
                'integer',
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
            'capacitacion_costo' => [
                'nullable',
                'array',
            ],
            'capacitacion_costo.*.costo_id' => [
                'required',
            ],
            'capacitacion_costo.*.valor' => [
                'required',
                'integer',
                'min:0',
            ],
        ];
        // Condición para agregar la regla unique
        if (isset($this->capacitacion)) {
            $rules['codigo'][] = Rule::unique('capacitacions')->ignore($this->capacitacion);
        } else {
            $rules['codigo'][] = Rule::unique('capacitacions');
        }

        if ($this->is_libre) {
            $rules['vacantes'][] = 'min:0';
        } else {
            $rules['vacantes'][] = 'min:1';
        }
        return $rules;
    }

    public function store()
    {
        return \DB::transaction(function () {
            $validated = $this->validate();
            $capacitacion = Capacitacion::create($validated);
            $capacitacion->nivels()->sync($this->nivel_ids);

            /* ITEMS */
            // Preparar datos para sincronización
            $syncData = [];
            foreach ($this->capacitacion_item as $item) {
                $syncData[$item['item_id']] = ['respuesta_id' => $item['respuesta_id']];
            }
            // Sincronizar respuestas y valores
            $capacitacion->items()->sync($syncData);

            /* COSTOS */
            // Preparar datos para sincronización
            $costoPivot = [];
            foreach ($this->capacitacion_costo as $costo) {
                $costoPivot[$costo['costo_id']] = ['valor' => $costo['valor']];
            }
            // Sincronizar respuestas y valores
            $capacitacion->costos()->sync($costoPivot);
            $this->reset();
        });
    }

    public function update()
    {
        return \DB::transaction(function () {
            $validated = $this->validate();
            $this->capacitacion->update($validated);
            $this->capacitacion->nivels()->sync($this->nivel_ids);
            /* ITEMS */
            // Preparar datos para sincronización
            $syncData = [];
            foreach ($this->capacitacion_item as $item) {
                $syncData[$item['item_id']] = ['respuesta_id' => $item['respuesta_id']];
            }
            // Sincronizar respuestas y valores
            $this->capacitacion->items()->sync($syncData);

            /* COSTOS */
            // Preparar datos para sincronización
            $costoPivot = [];
            foreach ($this->capacitacion_costo as $costo) {
                $costoPivot[$costo['costo_id']] = ['valor' => $costo['valor']];
            }
            // Sincronizar respuestas y valores
            $this->capacitacion->costos()->sync($costoPivot);
            $this->reset();
        });
    }
}