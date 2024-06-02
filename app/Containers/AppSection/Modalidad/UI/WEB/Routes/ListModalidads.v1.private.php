<?php

use App\Containers\AppSection\Modalidad\UI\WEB\Components\ModalidadList;
use Illuminate\Support\Facades\Route;

Route::get('modalidades', ModalidadList::class)
    ->middleware(['auth:web']);

