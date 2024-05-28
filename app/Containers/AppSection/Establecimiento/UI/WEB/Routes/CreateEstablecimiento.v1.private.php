<?php

use App\Containers\AppSection\Establecimiento\UI\WEB\Controllers\CreateEstablecimientoController;
use Illuminate\Support\Facades\Route;

Route::get('establecimientos/create', [CreateEstablecimientoController::class, 'create'])
    ->middleware(['auth:web']);

