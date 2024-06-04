<?php

use App\Containers\AppSection\Nivel\UI\WEB\Components\NivelList;
use Illuminate\Support\Facades\Route;

Route::get('niveles', NivelList::class)
    ->middleware(['auth:web']);

