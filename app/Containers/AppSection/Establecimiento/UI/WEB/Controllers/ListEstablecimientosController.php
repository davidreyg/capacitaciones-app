<?php

namespace App\Containers\AppSection\Establecimiento\UI\WEB\Controllers;

use App\Containers\AppSection\Establecimiento\Actions\ListEstablecimientosAction;
use App\Containers\AppSection\Establecimiento\UI\WEB\Requests\ListEstablecimientosRequest;
use App\Ship\Parents\Controllers\WebController;

class ListEstablecimientosController extends WebController
{
    public function index(ListEstablecimientosRequest $request)
    {
        $establecimientos = app(ListEstablecimientosAction::class)->run($request);
        // ...
    }
}
