<?php

use App\Containers\AppSection\Oportunidad\UI\WEB\Components\OportunidadCreate;
use Illuminate\Support\Facades\Route;

Route::get('oportunidades/create', OportunidadCreate::class)
    ->middleware(['auth:web']);

