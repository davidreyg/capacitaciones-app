<?php

namespace App\Containers\AppSection\TipoCapacitacion\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class TipoCapacitacionRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
