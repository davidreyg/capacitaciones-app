<?php

use App\Containers\AppSection\Nivel\UI\WEB\Components\NivelEdit;
use Illuminate\Support\Facades\Route;

Route::get('niveles/{nivel}/edit', NivelEdit::class)
    ->name('niveles.edit')
    ->middleware(['auth:web']);

