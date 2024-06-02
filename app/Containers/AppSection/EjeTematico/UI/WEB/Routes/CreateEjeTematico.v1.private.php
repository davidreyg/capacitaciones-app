<?php

use App\Containers\AppSection\EjeTematico\UI\WEB\Components\EjeTematicoCreate;
use Illuminate\Support\Facades\Route;

Route::get('ejes-tematicos/create', EjeTematicoCreate::class)
    ->middleware(['auth:web']);

