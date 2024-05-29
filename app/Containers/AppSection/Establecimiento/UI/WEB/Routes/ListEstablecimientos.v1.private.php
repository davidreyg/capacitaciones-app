<?php

use App\Containers\AppSection\Establecimiento\UI\WEB\Components\EstablecimientoList;
use Illuminate\Support\Facades\Route;

Route::get('establecimientos', EstablecimientoList::class)
    ->middleware(['auth:web']);

