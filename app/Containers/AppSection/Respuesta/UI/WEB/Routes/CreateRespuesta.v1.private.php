<?php

use App\Containers\AppSection\Respuesta\UI\WEB\Components\RespuestaCreate;
use Illuminate\Support\Facades\Route;

Route::get('respuestas/create', RespuestaCreate::class)
    ->middleware(['auth:web']);

