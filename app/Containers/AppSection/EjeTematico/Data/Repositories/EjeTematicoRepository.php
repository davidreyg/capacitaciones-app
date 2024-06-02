<?php

namespace App\Containers\AppSection\EjeTematico\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class EjeTematicoRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
