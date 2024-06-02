<?php

use App\Containers\AppSection\User\UI\WEB\Components\UserList;
use Illuminate\Support\Facades\Route;

Route::get('users', UserList::class)
    ->middleware(['auth:web']);

