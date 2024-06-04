<?php

use App\Containers\AppSection\Costo\UI\WEB\Components\CostoEdit;
use Illuminate\Support\Facades\Route;

Route::get('costos/{costo}/edit', CostoEdit::class)
    ->name('costos.edit')
    ->middleware(['auth:web']);

