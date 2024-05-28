<?php

namespace App\Containers\AppSection\Establecimiento\UI\WEB\Controllers;

use App\Containers\AppSection\Establecimiento\Actions\FindEstablecimientoByIdAction;
use App\Containers\AppSection\Establecimiento\UI\WEB\Requests\FindEstablecimientoByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindEstablecimientoByIdController extends WebController
{
    public function show(FindEstablecimientoByIdRequest $request)
    {
        $establecimiento = app(FindEstablecimientoByIdAction::class)->run($request);
        // ...
    }
}
