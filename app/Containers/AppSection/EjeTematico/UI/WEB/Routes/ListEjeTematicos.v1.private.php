<?php

use App\Containers\AppSection\EjeTematico\UI\WEB\Components\EjeTematicoList;
use Illuminate\Support\Facades\Route;

Route::get('ejes-tematicos', EjeTematicoList::class)
    ->middleware(['auth:web']);

