<?php

use App\Containers\AppSection\User\UI\WEB\Components\UserEdit;
use Illuminate\Support\Facades\Route;

Route::get('users/{user}/edit', UserEdit::class)
    ->name('users.edit')
    ->middleware(['auth:web']);

