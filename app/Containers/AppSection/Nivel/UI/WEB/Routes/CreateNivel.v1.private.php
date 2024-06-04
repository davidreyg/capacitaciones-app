<?php

use App\Containers\AppSection\Nivel\UI\WEB\Components\NivelCreate;
use Illuminate\Support\Facades\Route;

Route::get('niveles/create', NivelCreate::class)
    ->middleware(['auth:web']);

