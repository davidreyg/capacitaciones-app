<?php

use App\Containers\AppSection\Oportunidad\UI\WEB\Components\OportunidadEdit;
use Illuminate\Support\Facades\Route;

Route::get('oportunidades/{oportunidad}/edit', OportunidadEdit::class)
    ->name('oportunidades.edit')
    ->middleware(['auth:web']);

