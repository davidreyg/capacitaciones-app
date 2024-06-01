<?php

use App\Containers\AppSection\Authorization\UI\WEB\Components\RoleEdit;
use Illuminate\Support\Facades\Route;

Route::get('roles/{role}/edit', RoleEdit::class)
    ->name('roles.edit')
    ->middleware(['auth:web']);

