<?php

use App\Containers\AppSection\Capacitacion\UI\WEB\Components\CapacitacionBuscar;
use Illuminate\Support\Facades\Route;

Route::get('buscar-capacitaciones', CapacitacionBuscar::class)
    ->middleware(['auth:web']);

