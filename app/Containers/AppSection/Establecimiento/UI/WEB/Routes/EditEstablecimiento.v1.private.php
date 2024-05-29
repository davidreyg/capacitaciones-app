<?php

use App\Containers\AppSection\Establecimiento\UI\WEB\Components\EstablecimientoEdit;
use Illuminate\Support\Facades\Route;

Route::get('establecimientos/{establecimiento}/edit', EstablecimientoEdit::class)
    ->name('establecimientos.edit')
    ->middleware(['auth:web']);

