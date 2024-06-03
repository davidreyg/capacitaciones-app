<?php

use App\Containers\AppSection\Costo\UI\WEB\Components\CostoCreate;
use Illuminate\Support\Facades\Route;

Route::get('costos/create', CostoCreate::class)
    ->middleware(['auth:web']);

