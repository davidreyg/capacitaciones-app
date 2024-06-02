<?php

use App\Containers\AppSection\Respuesta\UI\WEB\Components\RespuestaList;
use Illuminate\Support\Facades\Route;

Route::get('respuestas', RespuestaList::class)
    ->middleware(['auth:web']);