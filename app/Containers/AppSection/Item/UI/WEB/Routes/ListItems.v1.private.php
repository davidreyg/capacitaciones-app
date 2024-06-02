<?php

use App\Containers\AppSection\Item\UI\WEB\Components\ItemList;
use Illuminate\Support\Facades\Route;

Route::get('items', ItemList::class)
    ->middleware(['auth:web']);

