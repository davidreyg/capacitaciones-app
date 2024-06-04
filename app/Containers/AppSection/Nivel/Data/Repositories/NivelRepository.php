<?php

namespace App\Containers\AppSection\Nivel\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class NivelRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
