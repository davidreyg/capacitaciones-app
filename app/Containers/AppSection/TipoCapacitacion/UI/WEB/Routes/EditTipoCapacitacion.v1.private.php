<?php

use App\Containers\AppSection\TipoCapacitacion\UI\WEB\Components\TipoCapacitacionEdit;
use Illuminate\Support\Facades\Route;

Route::get('tipo-capacitaciones/{tipoCapacitacion}/edit', TipoCapacitacionEdit::class)
    ->name('tipo-capacitaciones')
    ->middleware(['auth:web']);

