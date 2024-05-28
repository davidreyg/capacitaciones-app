<?php

use App\Containers\AppSection\Establecimiento\UI\WEB\Controllers\CreateEstablecimientoController;
use Illuminate\Support\Facades\Route;

Route::post('establecimientos/store', [CreateEstablecimientoController::class, 'store'])
    ->middleware(['auth:web']);

