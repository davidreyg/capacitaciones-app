<?php

use App\Containers\AppSection\Establecimiento\UI\WEB\Controllers\DeleteEstablecimientoController;
use Illuminate\Support\Facades\Route;

Route::delete('establecimientos/{id}', [DeleteEstablecimientoController::class, 'destroy'])
    ->middleware(['auth:web']);

