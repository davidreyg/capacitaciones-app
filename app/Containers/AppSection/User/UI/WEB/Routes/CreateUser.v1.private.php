<?php

use App\Containers\AppSection\User\UI\WEB\Components\UserCreate;
use Illuminate\Support\Facades\Route;

Route::get('users/create', UserCreate::class)
    ->middleware(['auth:web']);

