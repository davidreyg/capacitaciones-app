<?php

namespace App\Containers\AppSection\Costo\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class CostoRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
