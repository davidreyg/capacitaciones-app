<?php

namespace App\Containers\AppSection\Modalidad\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ModalidadRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
