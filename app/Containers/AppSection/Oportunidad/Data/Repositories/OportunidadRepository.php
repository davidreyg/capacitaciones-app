<?php

namespace App\Containers\AppSection\Oportunidad\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class OportunidadRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
