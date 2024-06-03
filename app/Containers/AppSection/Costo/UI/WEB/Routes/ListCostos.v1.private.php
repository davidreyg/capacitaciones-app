<?php

use App\Containers\AppSection\Costo\UI\WEB\Components\CostoList;
use Illuminate\Support\Facades\Route;

Route::get('costos', CostoList::class)
    ->middleware(['auth:web']);

