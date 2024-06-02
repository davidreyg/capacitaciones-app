<?php

use App\Containers\AppSection\Item\UI\WEB\Components\ItemCreate;
use Illuminate\Support\Facades\Route;

Route::get('items/create', ItemCreate::class)
    ->middleware(['auth:web']);

