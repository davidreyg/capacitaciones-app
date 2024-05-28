<?php

use App\Containers\AppSection\Establecimiento\UI\WEB\Components\EstablecimientoIndex;
use Illuminate\Support\Facades\Route;

Route::get('establecimientos', EstablecimientoIndex::class)
    ->middleware(['auth:web']);

