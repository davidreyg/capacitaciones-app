<?php

use App\Containers\AppSection\EjeTematico\UI\WEB\Components\EjeTematicoEdit;
use Illuminate\Support\Facades\Route;

Route::get('ejes-tematicos/{ejeTematico}/edit', EjeTematicoEdit::class)
    ->name('ejes-tematicos.edit')
    ->middleware(['auth:web']);

