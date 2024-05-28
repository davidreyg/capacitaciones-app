<?php

namespace App\Containers\AppSection\Establecimiento\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Establecimiento\Data\Repositories\EstablecimientoRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListEstablecimientosTask extends ParentTask
{
    public function __construct(
        protected readonly EstablecimientoRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->addRequestCriteria()->paginate();
    }
}
