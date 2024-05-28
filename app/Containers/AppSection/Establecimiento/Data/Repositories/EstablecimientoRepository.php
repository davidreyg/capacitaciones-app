<?php

namespace App\Containers\AppSection\Establecimiento\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class EstablecimientoRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
