<?php

use App\Containers\AppSection\TipoCapacitacion\UI\WEB\Components\TipoCapacitacionCreate;
use Illuminate\Support\Facades\Route;

Route::get('tipo-capacitaciones/create', TipoCapacitacionCreate::class)
    ->middleware(['auth:web']);

