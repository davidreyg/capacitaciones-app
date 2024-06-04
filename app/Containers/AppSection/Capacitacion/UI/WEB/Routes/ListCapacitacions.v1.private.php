<?php

use App\Containers\AppSection\Capacitacion\UI\WEB\Components\CapacitacionList;
use Illuminate\Support\Facades\Route;

Route::get('capacitaciones', CapacitacionList::class)
    ->middleware(['auth:web']);

