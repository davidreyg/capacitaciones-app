<?php

use App\Containers\AppSection\Establecimiento\UI\WEB\Components\EstablecimientoCreate;
use Illuminate\Support\Facades\Route;

Route::get('establecimientos/create', EstablecimientoCreate::class)
    ->middleware(['auth:web']);

