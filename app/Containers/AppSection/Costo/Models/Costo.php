<?php

namespace App\Containers\AppSection\Costo\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Costo extends ParentModel
{

    protected $fillable = ['nombre', 'tipo'];
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Costo';
}
