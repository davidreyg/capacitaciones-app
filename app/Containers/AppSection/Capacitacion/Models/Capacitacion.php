<?php

namespace App\Containers\AppSection\Capacitacion\Models;

use App\Containers\AppSection\Item\Models\Item;
use App\Containers\AppSection\Nivel\Models\Nivel;
use App\Ship\Parents\Models\Model as ParentModel;

class Capacitacion extends ParentModel
{
    protected $fillable = [
        'nombre',
        'codigo',
        'fecha_inicio',
        'fecha_fin',
        'perfil',
        'objetivo_aprendizaje',
        'objetivo_desempeño',
        'creditos',
        'numero_horas',
        'problema',
        'tipo_capacitacion_id',
        'eje_tematico_id',
        'modalidad_id',
        'oportunidad_id',
    ];
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Capacitacion';

    public function nivels()
    {
        return $this->belongsToMany(Nivel::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)
            ->withPivot(['respuesta_id']);
    }
}