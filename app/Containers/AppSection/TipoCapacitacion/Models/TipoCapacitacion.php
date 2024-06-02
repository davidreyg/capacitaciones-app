<?php

namespace App\Containers\AppSection\TipoCapacitacion\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class TipoCapacitacion extends ParentModel
{
    public $timestamps = false;
    protected $fillable = ['nombre'];
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'TipoCapacitacion';
}
