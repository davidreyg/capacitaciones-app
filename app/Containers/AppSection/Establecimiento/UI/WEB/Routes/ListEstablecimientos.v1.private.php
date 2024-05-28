<?php

use App\Containers\AppSection\Establecimiento\UI\WEB\Controllers\ListEstablecimientosController;
use Illuminate\Support\Facades\Route;

Route::get('establecimientos', [ListEstablecimientosController::class, 'index'])
    ->middleware(['auth:web']);

