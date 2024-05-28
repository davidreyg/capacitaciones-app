<?php

namespace App\Containers\AppSection\Establecimiento\UI\WEB\Controllers;

use App\Containers\AppSection\Establecimiento\Actions\FindEstablecimientoByIdAction;
use App\Containers\AppSection\Establecimiento\Actions\UpdateEstablecimientoAction;
use App\Containers\AppSection\Establecimiento\UI\WEB\Requests\EditEstablecimientoRequest;
use App\Containers\AppSection\Establecimiento\UI\WEB\Requests\UpdateEstablecimientoRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateEstablecimientoController extends WebController
{
    public function edit(EditEstablecimientoRequest $request)
    {
        $establecimiento = app(FindEstablecimientoByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateEstablecimientoRequest $request)
    {
        $establecimiento = app(UpdateEstablecimientoAction::class)->run($request);
        // ...
    }
}
