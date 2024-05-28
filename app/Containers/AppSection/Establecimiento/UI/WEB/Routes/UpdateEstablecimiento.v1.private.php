<?php

use App\Containers\AppSection\Establecimiento\UI\WEB\Controllers\UpdateEstablecimientoController;
use Illuminate\Support\Facades\Route;

Route::patch('establecimientos/{id}', [UpdateEstablecimientoController::class, 'update'])
    ->middleware(['auth:web']);

