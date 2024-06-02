<?php

use App\Containers\AppSection\TipoCapacitacion\UI\WEB\Components\TipoCapacitacionList;
use Illuminate\Support\Facades\Route;

Route::get('tipo-capacitaciones', TipoCapacitacionList::class)
    ->middleware(['auth:web']);

