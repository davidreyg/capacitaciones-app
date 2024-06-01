<?php

use App\Containers\AppSection\Authorization\UI\WEB\Components\RoleCreate;
use Illuminate\Support\Facades\Route;

Route::get('roles/create', RoleCreate::class)
    ->middleware(['auth:web']);

