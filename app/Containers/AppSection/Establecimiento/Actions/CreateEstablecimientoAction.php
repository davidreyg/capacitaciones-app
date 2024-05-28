<?php

namespace App\Containers\AppSection\Establecimiento\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use App\Containers\AppSection\Establecimiento\Tasks\CreateEstablecimientoTask;
use App\Containers\AppSection\Establecimiento\UI\WEB\Requests\CreateEstablecimientoRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateEstablecimientoAction extends ParentAction
{
    public function __construct(
        private readonly CreateEstablecimientoTask $createEstablecimientoTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateEstablecimientoRequest $request): Establecimiento
    {
        $data = $request->validated();

        return $this->createEstablecimientoTask->run($data);
    }
}
