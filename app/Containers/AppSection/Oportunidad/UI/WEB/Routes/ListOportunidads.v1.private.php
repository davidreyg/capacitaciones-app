<?php

use App\Containers\AppSection\Oportunidad\UI\WEB\Components\OportunidadList;
use Illuminate\Support\Facades\Route;

Route::get('oportunidades', OportunidadList::class)
    ->middleware(['auth:web']);

