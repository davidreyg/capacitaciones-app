<?php

namespace App\Containers\AppSection\Establecimiento\Actions;

use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use App\Containers\AppSection\Establecimiento\Tasks\FindEstablecimientoByIdTask;
use App\Containers\AppSection\Establecimiento\UI\WEB\Requests\FindEstablecimientoByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindEstablecimientoByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindEstablecimientoByIdTask $findEstablecimientoByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindEstablecimientoByIdRequest $request): Establecimiento
    {
        return $this->findEstablecimientoByIdTask->run($request->id);
    }
}
