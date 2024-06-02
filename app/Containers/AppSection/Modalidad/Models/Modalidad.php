<?php

namespace App\Containers\AppSection\Modalidad\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Modalidad extends ParentModel
{
    public $timestamps = false;
    protected $fillable = ['nombre'];
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Modalidad';
}
