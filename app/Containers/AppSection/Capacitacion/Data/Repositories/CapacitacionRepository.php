<?php

namespace App\Containers\AppSection\Capacitacion\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class CapacitacionRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
