<?php

namespace App\Containers\AppSection\Capacitacion\Models;

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
    ];
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Capacitacion';
}
