<?php

use App\Containers\AppSection\Capacitacion\UI\WEB\Components\CapacitacionHabilitar;
use Illuminate\Support\Facades\Route;

Route::get('habilitar-capacitaciones', CapacitacionHabilitar::class)
    ->middleware(['auth:web']);

