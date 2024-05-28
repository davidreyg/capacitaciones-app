<?php

namespace App\Containers\AppSection\Establecimiento\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use App\Containers\AppSection\Establecimiento\Tasks\UpdateEstablecimientoTask;
use App\Containers\AppSection\Establecimiento\UI\WEB\Requests\UpdateEstablecimientoRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateEstablecimientoAction extends ParentAction
{
    public function __construct(
        private readonly UpdateEstablecimientoTask $updateEstablecimientoTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateEstablecimientoRequest $request): Establecimiento
    {
        $data = $request->validated();

        return $this->updateEstablecimientoTask->run($data, $request->id);
    }
}
