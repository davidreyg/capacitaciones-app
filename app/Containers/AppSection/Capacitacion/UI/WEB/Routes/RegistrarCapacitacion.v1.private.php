<?php

use App\Containers\AppSection\Capacitacion\UI\WEB\Components\CapacitacionRegistrar;
use Illuminate\Support\Facades\Route;

Route::get('registrar-capacitacion', CapacitacionRegistrar::class)
    ->middleware(['auth:web']);

