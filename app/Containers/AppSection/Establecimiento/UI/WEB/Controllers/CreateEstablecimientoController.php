<?php

namespace App\Containers\AppSection\Establecimiento\UI\WEB\Controllers;

use App\Containers\AppSection\Establecimiento\Actions\CreateEstablecimientoAction;
use App\Containers\AppSection\Establecimiento\UI\WEB\Requests\CreateEstablecimientoRequest;
use App\Containers\AppSection\Establecimiento\UI\WEB\Requests\StoreEstablecimientoRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateEstablecimientoController extends WebController
{
    public function create(CreateEstablecimientoRequest $request)
    {
    }

    public function store(StoreEstablecimientoRequest $request)
    {
        $establecimiento = app(CreateEstablecimientoAction::class)->run($request);
        // ...
    }
}
