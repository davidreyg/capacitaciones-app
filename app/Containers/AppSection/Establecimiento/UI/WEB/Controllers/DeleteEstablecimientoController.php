<?php

namespace App\Containers\AppSection\Establecimiento\UI\WEB\Controllers;

use App\Containers\AppSection\Establecimiento\Actions\DeleteEstablecimientoAction;
use App\Containers\AppSection\Establecimiento\UI\WEB\Requests\DeleteEstablecimientoRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteEstablecimientoController extends WebController
{
    public function destroy(DeleteEstablecimientoRequest $request)
    {
        $result = app(DeleteEstablecimientoAction::class)->run($request);
        // ...
    }
}
