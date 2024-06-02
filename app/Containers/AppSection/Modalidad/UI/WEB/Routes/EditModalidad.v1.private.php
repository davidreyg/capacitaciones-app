<?php

use App\Containers\AppSection\Modalidad\UI\WEB\Components\ModalidadEdit;
use Illuminate\Support\Facades\Route;

Route::get('modalidades/{modalidad}/edit', ModalidadEdit::class)
    ->name('modalidades.edit')
    ->middleware(['auth:web']);

