<?php

use App\Containers\AppSection\Item\UI\WEB\Components\ItemEdit;
use Illuminate\Support\Facades\Route;

Route::get('items/{item}/edit', ItemEdit::class)
    ->name('items.edit')
    ->middleware(['auth:web']);

