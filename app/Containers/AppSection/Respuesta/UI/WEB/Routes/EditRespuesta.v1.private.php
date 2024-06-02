<?php

use App\Containers\AppSection\Respuesta\UI\WEB\Components\RespuestaEdit;
use Illuminate\Support\Facades\Route;

Route::get('respuestas/{respuesta}/edit', RespuestaEdit::class)
    ->name('respuestas.edit')
    ->middleware(['auth:web']);