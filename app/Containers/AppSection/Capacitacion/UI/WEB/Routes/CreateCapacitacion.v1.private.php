<?php

use App\Containers\AppSection\Capacitacion\UI\WEB\Components\CapacitacionCreate;
use Illuminate\Support\Facades\Route;

Route::get('capacitaciones/create', CapacitacionCreate::class)
    ->middleware(['auth:web']);

