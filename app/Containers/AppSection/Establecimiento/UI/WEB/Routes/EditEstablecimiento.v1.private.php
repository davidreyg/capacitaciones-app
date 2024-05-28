<?php

use App\Containers\AppSection\Establecimiento\UI\WEB\Controllers\UpdateEstablecimientoController;
use Illuminate\Support\Facades\Route;

Route::get('establecimientos/{id}/edit', [UpdateEstablecimientoController::class, 'edit'])
    ->middleware(['auth:web']);

