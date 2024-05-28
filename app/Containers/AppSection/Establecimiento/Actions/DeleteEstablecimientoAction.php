<?php

namespace App\Containers\AppSection\Establecimiento\Actions;

use App\Containers\AppSection\Establecimiento\Tasks\DeleteEstablecimientoTask;
use App\Containers\AppSection\Establecimiento\UI\WEB\Requests\DeleteEstablecimientoRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteEstablecimientoAction extends ParentAction
{
    public function __construct(
        private readonly DeleteEstablecimientoTask $deleteEstablecimientoTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteEstablecimientoRequest $request): int
    {
        return $this->deleteEstablecimientoTask->run($request->id);
    }
}
