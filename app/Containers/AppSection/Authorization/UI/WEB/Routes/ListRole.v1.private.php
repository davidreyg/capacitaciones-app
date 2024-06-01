<?php

use App\Containers\AppSection\Authorization\UI\WEB\Components\RoleList;
use Illuminate\Support\Facades\Route;

Route::get('roles', RoleList::class)
    ->middleware(['auth:web']);

