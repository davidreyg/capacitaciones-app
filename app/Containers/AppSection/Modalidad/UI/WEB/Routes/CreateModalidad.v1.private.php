<?php

use App\Containers\AppSection\Modalidad\UI\WEB\Components\ModalidadCreate;
use Illuminate\Support\Facades\Route;

Route::get('modalidades/create', ModalidadCreate::class)
    ->middleware(['auth:web']);

