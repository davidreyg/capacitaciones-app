<?php

use App\Containers\AppSection\Capacitacion\UI\WEB\Components\CapacitacionEdit;
use Illuminate\Support\Facades\Route;

Route::get('capacitaciones/{capacitacion}/edit', CapacitacionEdit::class)
    ->name('capacitaciones.edit')
    ->middleware(['auth:web']);

