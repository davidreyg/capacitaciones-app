<?php

use App\Containers\AppSection\Establecimiento\UI\WEB\Controllers\FindEstablecimientoByIdController;
use Illuminate\Support\Facades\Route;

Route::get('establecimientos/{id}', [FindEstablecimientoByIdController::class, 'show'])
    ->middleware(['auth:web']);

