<?php

namespace App\Containers\AppSection\Establecimiento\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Establecimiento\Tasks\ListEstablecimientosTask;
use App\Containers\AppSection\Establecimiento\UI\WEB\Requests\ListEstablecimientosRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListEstablecimientosAction extends ParentAction
{
    public function __construct(
        private readonly ListEstablecimientosTask $listEstablecimientosTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListEstablecimientosRequest $request): mixed
    {
        return $this->listEstablecimientosTask->run();
    }
}
